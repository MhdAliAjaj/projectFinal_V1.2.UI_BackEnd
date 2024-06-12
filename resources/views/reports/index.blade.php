<!DOCTYPE html>
<html>
<head>
    <title>Order Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Order Reports:</h1>

        <div class="mb-4">
            <h3>Statistics</h3>
            <p>Total Orders: {{ $totalOrders }}</p>
            <p>Unique Customers: {{ $uniqueCustomers }}</p>
            <p>Total Revenue: ${{ number_format($totalRevenue, 2) }}</p>
            <p>Average Order Price: ${{ number_format($averageOrderPrice, 2) }}</p>
            <h4>Services Count:</h4>
            <ul>
                @foreach ($servicesCount as $serviceId => $count)
                    @php
                        $order = $orders->firstWhere('service_id', $serviceId);
                    @endphp
                    @if ($order && $order->service)
                        <li>{{ $order->service->title }}: {{ $count }}</li>
                    @else
                        <li>Unknown Service: {{ $count }}</li>
                    @endif
                @endforeach
            </ul>
            <p>Most Requested Service: {{ $mostRequestedService ? ($orders->firstWhere('service_id', $mostRequestedService)->service->title ?? 'Unknown Service') : 'N/A' }} ({{ $mostRequestedServiceCount }} requests)</p>
            <p>Most Active Customer: {{ $mostActiveCustomer }} ({{ $mostActiveCustomerCount }} orders)</p>
            <p>Latest Order Date: {{ $latestOrder ? $latestOrder->date : 'No orders available' }}</p>

            <h4>Orders in the Last 30 Days:</h4>
            <p>Total Orders: {{ $totalOrdersLast30Days }}</p>
            <p>Total Revenue: ${{ number_format($totalRevenueLast30Days, 2) }}</p>

            <h4>Monthly Revenue:</h4>
            <ul>
                @foreach ($monthlyRevenue as $monthData)
                    <li>{{ $monthData->year }}-{{ $monthData->month }}: ${{ number_format($monthData->total, 2) }}</li>
                @endforeach
            </ul>

            <h4>Daily Orders:</h4>
            <ul>
                @foreach ($dailyOrders as $dayData)
                    <li>{{ $dayData->date }}: {{ $dayData->count }} orders</li>
                @endforeach
            </ul>
        </div>

        <table class="table table-bordered">
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
                        <td>{{ $order->user && $order->user->role == 'customer' ? $order->user->name : 'null' }}</td>
                        <td>{{ $order->date }}</td>
                        <td>${{ number_format($order->service ? $order->service->price : 0, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
