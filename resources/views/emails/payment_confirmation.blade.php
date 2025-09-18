<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You for Your Payment!</title>
</head>
<body>
    <p>Subject: Thank You for Your Payment!</p>

    <p>Good Morning, {{ $user->firstname }} {{ $user->lastname }} !</p>

    <p>Thank you for paying for your photo shoot!</p>

    <p>
        Location: {{ $shoot->location }} <br>
        Payment Date: {{ $payment->created_at }} <br>
        Payment Amount: ${{ number_format($payment->amount, 2) }}
    </p>

    <p>
        {{ $shoot->date }} <br>
        Photographer: {{ $shoot->photographer }}
    </p>

    <p>
        {{-- List purchased packages --}}
        @foreach($shoot->packages as $package)
            * {{ $package['name'] }}, [${{ number_format($package['price'], 2) }}] <br>
        @endforeach
    </p>

    <p>
        <strong>Shoot Notes:</strong><br>
        {{ $shoot->notes ?? 'N/A' }}
    </p>

    <p>
        Once your photos are completed you will receive a Summary email 
        if you have photo packages ready for download.
    </p>

    <p>
        If you have any questions about this photo shoot please reply to this email, 
        or email <a href="mailto:contact@reprophotos.com">contact@reprophotos.com</a> directly.
    </p>

    <p>Thank you!</p>

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
