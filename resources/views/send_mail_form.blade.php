<!-- resources/views/send_mail_form.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Send Mail Form</title>
</head>
<body>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store.mail.data') }}" method="POST">
        @csrf
        <label for="employee_email">Employee Email:</label>
        <input type="email" name="employee_email" id="employee_email" required>
        <br>
        <label for="customer_email">Customer Email:</label>
        <input type="email" name="customer_email" id="customer_email" required>
        <br>
        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea>
        <br>
        <button type="submit">Store Data</button>
    </form>
</body>
</html>
