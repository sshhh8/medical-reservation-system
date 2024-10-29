<html>
    <head>
        <title>{{ $title ?? 'Medical Reservation' }}</title>
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>
    <body>
        <nav>
            <h3>診療予約システム</h3>
            <hr>
        </nav>
        {{ $slot }}
        <footer>
            <hr />
            © 2024 medical.com
        </footer>
        <!-- <div class="side">
            <p>サイドメニュー</p>
            <li>予約</li>
            <li>マイページ</li>
        </div> -->
    </body>
</html>
