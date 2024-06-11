<!DOCTYPE html>
<html>
<head><br>
    <title>Annual Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Annual Report - {{ now()->year }}</h1>

        <div class="mb-4">
            <h3>Statistics</h3>
            <p>Total Revenue: ${{ number_format($totalRevenue, 2) }}</p>
            <p>Total Orders: {{ $totalOrders }}</p>
            <p>New Customers: {{ $newCustomers }}</p>
            <p>Completed Orders: {{ $completedOrders }}</p>
            <p>Canceled Orders: {{ $canceledOrders }}</p>

            <h4>Most Requested Services:</h4>
            <ul>
                @foreach ($mostRequestedServices as $service)
                    <li>{{ $service->service->name }}: {{ $service->total }} orders</li>
                @endforeach
            </ul>

            <h4>Least Requested Services:</h4>
            <ul>
                @foreach ($leastRequestedServices as $service)
                    <li>{{ $service->service->name }}: {{ $service->total }} orders</li>
                @endforeach
            </ul>

            <h4>Monthly Revenue:</h4>
            <ul>
                @foreach ($monthlyRevenue as $monthData)
                    <li>{{ DateTime::createFromFormat('!m', $monthData->month)->format('F') }}: ${{ number_format($monthData->total, 2) }}</li>
                @endforeach
            </ul>

            <h4>Weekly Revenue:</h4>
            <ul>
                @foreach ($weeklyRevenue as $weekData)
                    <li>Week {{ $weekData->week }}: ${{ number_format($weekData->total, 2) }}</li>
                @endforeach
            </ul>

            <h4>Monthly Growth Rate:</h4>
            <ul>
                @foreach ($monthlyGrowth as $growthData)
                    <li>{{ DateTime::createFromFormat('!m', $growthData['month'])->format('F') }}: {{ number_format($growthData['growth'], 2) }}%</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
