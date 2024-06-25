<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            color: #343a40;
        }
        h3, h4 {
            color: #343a40;
        }
        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 0;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #343a40; /* فضي داكن */
            color: white; /* لون النص داخل الشريط */
            padding: 12px 20px;
        }
        .card-header h3, .card-header h4, .card-header p {
            color: white; /* تأكيد اللون الأبيض للنص داخل الشريط */
        }
        .card-body {
            padding: 20px;
        }
        .badge-primary, .badge-secondary {
            font-size: 1em;
            padding: 8px 12px;
            background-color: #6c757d; /* فضي داكن */
        }
        .badge-primary {
            color: #fff; /* لون الأرقام أبيض */
        }
        .badge-secondary {
            background-color: #adb5bd; /* لون فضي فاتح */
            color: #fff; /* لون الأرقام أبيض */
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Order Reports</h1>

        <div class="card">
            <div class="card-header">
                <h3>Statistics</h3>
            </div>
            <div class="card-body">
                <p><strong>Total Orders:</strong> {{ $totalOrders }}</p>
                <p><strong>Unique Customers:</strong> {{ $uniqueCustomers }}</p>
                <p><strong>Total Revenue:</strong> {{ number_format($totalRevenue, 2) }}$</p>
                <p><strong>Average Order Price:</strong> {{ number_format($averageOrderPrice, 2) }}$</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Services Count</h4>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($serviceOrderCounts as $serviceOrderCount)
                    <li class="list-group-item">
                        {{ $serviceOrderCount['title'] }}
                        <span class="badge badge-primary badge-pill">{{ $serviceOrderCount['count'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Most Requested Service</h4>
            </div>
            <div class="card-body">
                @if($mostRequestedService)
                    <p>{{ $mostRequestedService->title }}: {{ $mostRequestedServiceCount }} requests</p>
                @else
                    <p>No services found.</p>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>All Services Ordered by Request Count</h4>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($servicesWithOrderCount as $service)
                    <li class="list-group-item">
                        {{ $service->title }}
                        <span class="badge badge-secondary badge-pill">{{ $service->orders_count }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Customer with Most Orders</h4>
            </div>
            <div class="card-body">
                @if ($customerWithMostOrders)
                    <p>{{ $customerWithMostOrders->name }} has {{ $customerWithMostOrders->orders_count }} orders.</p>
                @else
                    <p>No customers found.</p>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Orders in the Last 30 Days</h4>
            </div>
            <div class="card-body">
                <p><strong>Total Orders:</strong> {{ $totalOrdersLast30Days }}</p>
                <p><strong>Total Revenue:</strong> {{ number_format($totalRevenueLast30Days, 2) }}$</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Monthly Revenue</h4>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($monthlyRevenue as $monthData)
                    <li class="list-group-item">
                        {{ $monthData->year }}-{{ $monthData->month }}: {{ number_format($monthData->total, 2) }}$
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Daily Orders</h4>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($dailyOrders as $dayData)
                    <li class="list-group-item">
                        {{ $dayData->date }}: {{ $dayData->count }} orders
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3>Order Details</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                <div class="card-header">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->service ? $order->service->title : 'Unknown Service' }}</td>
                                <td>{{ $order->user && $order->user->roles_name == 'Customer' ? $order->user->name : 'null' }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ number_format($order->service ? $order->service->price : 0, 2) }}$</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
            </div>
        </div>
    </div>
</body>
</html>
