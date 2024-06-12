<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
            $orders = Order::with('service')->get();
            
            // احصائيات
            $totalOrders = $orders->count();
            $servicesCount = $orders->groupBy('service')->map->count();
            $uniqueCustomers = $orders->groupBy('customer')->count();
            $totalRevenue = $orders->sum(function ($order) {
                return $order->service->price;
            });
            $latestOrder = $orders->sortByDesc('date')->first();

            // الطلبات في آخر 30 يومًا
            $ordersLast30Days = Order::with('service')
            ->where('date', '>=', Carbon::now()->subDays(30))
            ->get();
            $totalOrdersLast30Days = $ordersLast30Days->count();
            $totalRevenueLast30Days = $ordersLast30Days->sum(function ($order) {
                return $order->service->price;
            });

            // أكثر الخدمات طلبًا
            $mostRequestedService = $servicesCount->sortDesc()->keys()->first();
            $mostRequestedServiceCount = $servicesCount->max();

            // العملاء الأكثر نشاطًا
            $customersCount = $orders->groupBy('customer')->map->count();
            $mostActiveCustomer = $customersCount->sortDesc()->keys()->first();
            $mostActiveCustomerCount = $customersCount->max();

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
            'orders', 'totalOrders','servicesCount', 'uniqueCustomers','totalRevenue', 'latestOrder','ordersLast30Days','totalOrdersLast30Days','totalRevenueLast30Days',
            'mostRequestedService', 'mostRequestedServiceCount','customersCount', 'mostActiveCustomer', 'mostActiveCustomerCount',
            'averageOrderPrice', 'monthlyRevenue', 'dailyOrders'
            ));
    }

    public function annualReport()
    {
        $orders = Order::with('service')->get();

        $currentYear = Carbon::now()->year;

        // إجمالي الإيرادات السنوية
        $totalRevenue = Order::join('services', 'orders.service_id', '=', 'services.id')
        ->whereYear('orders.date', $currentYear)
        ->sum('services.price');

        // عدد الطلبات السنوية
        $totalOrders = Order::whereYear('date', $currentYear)->count();

        // العملاء الجدد السنوي
        $newCustomers = User::whereYear('created_at', $currentYear)->count();
       
        // الطلبات المكتملة
        $completedOrders = Order::whereYear('date', $currentYear)->where('status', 'completed')->count();

        // الطلبات الملغاة
        $canceledOrders = Order::whereYear('date', $currentYear)->where('status', 'canceled')->count();
       
        // أكثر الخدمات طلبًا
        $mostRequestedServices = Order::select('service_id', \DB::raw('count(*) as total'))
            ->whereYear('date', $currentYear)
            ->groupBy('service_id')
            ->orderBy('total', 'desc')
            ->with('service')
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
        
         // الإيرادات الشهرية
        $monthlyRevenue = Order::join('services', 'orders.service_id', '=', 'services.id')
            ->selectRaw('MONTH(orders.date) as month, SUM(services.price) as total')
            ->whereYear('orders.date', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();;
        // الإيرادات الأسبوعية
        $weeklyRevenue = Order::join('services', 'orders.service_id', '=', 'services.id')
            ->selectRaw('WEEK(orders.date) as week, SUM(services.price) as total')
            ->whereYear('orders.date', $currentYear)
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        // معدل النمو الشهري
        $previousMonthRevenue = 0;
        $monthlyGrowth = [];
        foreach ($monthlyRevenue as $monthData) {
            if ($previousMonthRevenue > 0) {
                $growth = (($monthData->total - $previousMonthRevenue) / $previousMonthRevenue) * 100;
                $monthlyGrowth[] = [
                    'month' => $monthData->month,
                    'growth' => $growth
                ];
            }
            $previousMonthRevenue = $monthData->total;
        }

         // عرض التقرير السنوي
        return view('reports.annual', compact(
            'totalRevenue',
            'totalOrders',
            'newCustomers',
            'completedOrders',
            'canceledOrders',
            'mostRequestedServices',
            'leastRequestedServices',
            'monthlyRevenue',
            'weeklyRevenue',
            'monthlyGrowth'
        ));
    }
}
