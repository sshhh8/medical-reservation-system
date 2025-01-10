<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Medical Reservation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Josefin+Sans&family=M+PLUS+1p&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        @yield('head-scripts')
    </head>
    <body>
        <div class="content-wrapper">
            <nav class="navbar navbar-expand-lg bg-body-bs-success-bg-subtle" style="background-color: #CEE6C1;">
                <div class="container-fluid">
                    <a href='{{ route('reservations.index') }}'><img src="{{asset('img/logo.svg')}}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <a class="navbar-brand" href='{{ route('reservations.index') }}'>診療予約システム</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href='{{ route('reservations.index') }}' >カレンダー</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='{{ route('profile.edit') }}' >マイページ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-sp">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: #CEE6C1;">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">診療予約システム</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href='{{ route('reservations.index') }}' >カレンダー</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ route('profile.edit') }}' >マイページ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        <main class="main-content">
            @yield('content')
        </main>
        </div>
        <footer>
            <hr />
            © hinako
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>
