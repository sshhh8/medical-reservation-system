<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Medical Reservation</title>
        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>
    <body>
        <button class="nav_btn" onclick="location.href='{{ route('profile.edit') }}' ">マイページ</button>
        <button class="nav_btn" onclick="location.href='{{ route('reservations.index') }}' ">予約</button>
    </body>
</html>
