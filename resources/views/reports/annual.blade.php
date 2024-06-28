<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annual Report</title>
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
        <h1 class="text-center mb-4">Annual Report - {{ now()->year }}</h1>

        <div class="card">
            <div class="card-header">
                <h3>Statistics</h3>
            </div>
            <div class="card-body">
                <p><strong>Total Revenue:</strong> {{ number_format($totalRevenue, 2) }}$</p>
                <p><strong>Total Orders:</strong> {{ $totalOrders }}</p>
                <p><strong>New Customers:</strong> {{ $newCustomers }}</p>
                <p><strong>Completed Orders:</strong> {{ $completedOrders }}</p>
                <p><strong>Canceled Orders:</strong> {{ $canceledOrders }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Most Requested Services</h4>
            </div>
            <div class="card-body">
                <ul>
                    @foreach ($mostRequestedServices as $service)
                        <li>{{ $service->service->title }}: {{ $service->total }} orders</li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h4>Total Revenue {{ now()->year }}</h4>
            </div>
            <div class="card-body">
                <p>إجمالي الإيرادات السنوي: ${{ number_format($totalRevenue, 2) }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Monthly Revenue</h4>
            </div>
            <div class="card-body">
                <ul>
                    @foreach ($monthlyRevenue as $monthData)
                        <li>{{ DateTime::createFromFormat('!m', $monthData->month)->format('F') }}: {{ number_format($monthData->total, 2) }}$</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Weekly Revenue</h4>
            </div>
            <div class="card-body">
                <ul>
                    @foreach ($weeklyRevenue as $weekData)
                        <li>Week {{ $weekData->week }}: {{ number_format($weekData->total, 2) }}$</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>