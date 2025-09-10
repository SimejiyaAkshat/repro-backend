<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>R/E Pro Photos New Account Information</title>
</head>
<body>
    <p>Subject: R/E Pro Photos New Account Information</p>

    <p>Hello, {{ $user->firstname }} !</p>

    <p>
        A new account has been created on the R/E Pro Photos client website: 
        <a href="https://pro.reprophotos.com">https://pro.reprophotos.com</a>
    </p>

    <p>
        Please visit the following link to create a password for your new account:
        <a href="{{ $resetLink }}">Create a Password</a>
    </p>

    <p>To login to your account, visit our client login page at any time.</p>

    <p>For future reference, the information you have submitted to create your account is listed below:</p>

    <p>
        Name: {{ $user->firstname }} {{ $user->lastname }}<br>
        Company: {{ $user->company ?? '' }}<br>
        Phone: {{ $user->phone ?? 'N/A' }}<br>
        Email: {{ $user->email }}
    </p>

    <p>
        If you have any questions about your account please feel free to reply to this email, 
        or email <a href="mailto:contact@reprophotos.com">contact@reprophotos.com</a> directly.
    </p>

    <p>Thanks for the opportunity to provide you with outstanding real estate marketing services!</p>

    <p>
        Customer Service Team <br>
        R/E Pro Photos <br>
        202-868-1663 <br>
        <a href="mailto:contact@reprophotos.com">contact@reprophotos.com</a> <br>
        <a href="https://reprophotos.com">https://reprophotos.com</a> <br>
        Pro Dashboard: <a href="https://pro.reprophotos.com">https://pro.reprophotos.com</a>
    </p>

    <p>
        We would love your feedback: 
        <a href="https://www.google.com/maps/place/R%2FE+Pro+Photos/reviews" target="_blank">
            Post a review on Google
        </a>.
    </p>
</body>
</html>
