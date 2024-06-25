<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
            $orders = Order::with('service','user')->get();
            
            // احصائيات
            $totalOrders = $orders->count();

            // عدد الطلبات لكل خدمة
            $servicesCount = $orders->groupBy('service')->map->count();

            // "Customer" استخراج معرفات المستخدمين الذين لديهم دور 
            $customerIds = User::where('roles_name', 'customer')->pluck('id');
            // عد العملاء الذين لديهم طلبات ومعرفاتهم موجودة ضمن معرفات العملاء المستخرجة
            $uniqueCustomers = Order::whereIn('user_id', $customerIds)
                ->distinct('user_id')
                ->count('user_id');
            echo $uniqueCustomers;
            // الايرادات الاجمالية     
            $totalRevenue = $orders->sum(function ($order) {
                return $order->service->price;
            });

            // أحدث الطلبات
            $latestOrder = $orders->sortByDesc('date')->first();

            // الطلبات في آخر 30 يومًا
            $ordersLast30Days = Order::with('service')
            ->where('date', '>=', Carbon::now()->subDays(30))
            ->get();
            $totalOrdersLast30Days = $ordersLast30Days->count();
            $totalRevenueLast30Days = $ordersLast30Days->sum(function ($order) {
                return $order->service->price;
            });
            
            // تجميع الطلبات حسب الخدمة
             $ordersGroupedByService = $orders->groupBy('service.title');  
            // إنشاء مصفوفة لحساب عدد الطلبات لكل خدمة و ترتيبها
            $serviceOrderCounts = $ordersGroupedByService->map(function ($orders, $serviceTitle) {
                return [
                     'title' => $serviceTitle ?: 'Unknown Service',
                     'count' => $orders->count()
                 ];
                })->sortByDesc('count'); // ترتيب الخدمات بناءً على عدد الطلبات من الأكثر للأقل

            // أكثر الخدمات طلبًا
            // جلب الخدمات مع عدد الطلبات المرتبطة بها، وترتيبها حسب الأكثر طلبًا
            $servicesWithOrderCount = Service::withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->get();
            $mostRequestedService = $servicesWithOrderCount->first();
            $mostRequestedServiceCount = $mostRequestedService ? $mostRequestedService->orders_count : 0;
      
            // العملاء الأكثر نشاطًا
            // استعلام لجلب عدد الطلبات لكل عميل وترتيبهم
            $customerWithMostOrders = User::select('users.name', DB::raw('COUNT(orders.id) as orders_count'))
            ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->where('users.roles_name', 'Customer')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('orders_count')
            ->first();

            // متوسط سعر الطلب
            $averageOrderPrice = $orders->avg(function ($order) {
                return $order->service->price;
            });

            // الإيرادات الشهرية
            $monthlyRevenue = Order::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(services.price) as total')
                ->join('services', 'orders.service_id', '=', 'services.id')
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get();

            // عدد الطلبات اليومي
            $dailyOrders = Order::selectRaw('DATE(date) as date, COUNT(*) as count')
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            return view('reports.index', compact(
                'orders',
                'totalOrders',
                'servicesCount',
                'serviceOrderCounts',
                'uniqueCustomers',
                'totalRevenue',
                'latestOrder',
                'ordersLast30Days',
                'totalOrdersLast30Days',
                'totalRevenueLast30Days',
                'mostRequestedService',
                'mostRequestedServiceCount',
                'customerWithMostOrders',
                'averageOrderPrice',
                'monthlyRevenue',
                'dailyOrders',
                'servicesWithOrderCount',
            ));
    }
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    public function annualReport()
    {
        // الاحصائيات
        $orders = Order::with('service')->get();
        
        // السنة الحالية
        $currentYear = Carbon::now()->year;

        // عدد الطلبات السنوية
        $totalOrders = Order::whereYear('date', $currentYear)->count();

        // العملاء الجدد السنوي
        $newCustomers = User::where('roles_name','Customer')->whereYear('created_at', $currentYear)->count();
       
        // الطلبات المكتملة
        $completedOrders = Order::whereYear('date', $currentYear)->where('status', '1')->count();

        // الطلبات الملغاة
        $canceledOrders = Order::whereYear('date', $currentYear)->where('status', '0') ->count();
       
        // أكثر الخدمات طلبًا
        $mostRequestedServices = Order::select('service_id', \DB::raw('count(*) as total'))
            ->whereYear('date', $currentYear)
            ->groupBy('service_id')
            ->orderBy('total', 'desc')
            ->with(['service' => function ($query) {
                $query->select('id', 'title');
            }])      
            ->take(5)
            ->get();

        // أقل الخدمات طلبًا
        $leastRequestedServices = Order::select('service_id', \DB::raw('count(*) as total'))
        ->whereYear('date', $currentYear)
        ->groupBy('service_id')
        ->orderBy('total', 'asc')
        ->with('service')
        ->take(5)
        ->get();

        // إجمالي الإيرادات السنوية
        $totalRevenue = Order::join('services', 'orders.service_id', '=', 'services.id')
        ->whereYear('orders.date', $currentYear)
        ->sum('services.price');

        // الإيرادات الشهرية
        $monthlyRevenue = Order::join('services', 'orders.service_id', '=', 'services.id')
        ->selectRaw('MONTH(orders.date) as month, SUM(services.price) as total')
        ->whereYear('orders.date', $currentYear)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // الإيرادات الأسبوعية
        $weeklyRevenue = Order::join('services', 'orders.service_id', '=', 'services.id')
        ->selectRaw('WEEK(orders.date) as week, SUM(services.price) as total')
        ->whereYear('orders.date', $currentYear)
        ->groupBy('week')
        ->orderBy('week')
        ->get();

       
        // عرض الاداء العام للشركة
        return view('reports.annual', compact(    
            'currentYear',      
            'totalRevenue',
            'totalOrders',
            'newCustomers',
            'completedOrders',
            'canceledOrders',
            'mostRequestedServices',
            'leastRequestedServices',
            'monthlyRevenue',
            'weeklyRevenue',
        ));
    }
}
