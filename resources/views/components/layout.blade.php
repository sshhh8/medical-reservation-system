<html>
  <head>
    <title>{{ $title ?? 'Example Website' }}</title>
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
  </body>
</html>
