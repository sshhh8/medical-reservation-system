{{-- <html>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <head>
        <title>{{ $title ?? 'Medical Reservation' }}</title>
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>
    <body>
        <nav>
            <h3>診療予約システム</h3>
            <hr>
        </nav>
        <div class="flex">
            <div class="sidebar">
                <button class="side_btn" onclick="location.href='{{ route('profile.edit') }}' ">マイページ</button><br>
                <button class="side_btn" onclick="location.href='{{ route('reservations.index') }}' ">予約</button>
            </div>
            <main class="w-full">
                {{ $slot }}
            </main>
        </div>
        <footer>
            <hr />
            © 2024 medical.com
        </footer>
    </body>
</html> --}}
