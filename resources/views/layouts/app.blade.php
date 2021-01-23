<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pati Destek</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<nav class="custom_menu nice_shadow">
    <div class="nav-wrapper container">
        <a href="#!" class="brand-logo black-text d-flex" ><img src="{{ asset('assets/images/logo2.png') }}" alt="" style="width: 48px;margin-top: 1px"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            @if(auth()->check())
                <li><a href="">Anasayfa</a></li>
                <li><a href="">İlanlar</a></li>
                <li><a href="">İstasyonlar</a></li>
                <li><a href="">Profilim</a></li>
            @else
                <li><a href="{{ route('login') }}">Giriş Yap</a></li>
                <li><a href="{{ route('register') }}">Kayıt Ol</a></li>
            @endif
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    @if(auth()->check())
        <li><a href="">Anasayfa</a></li>
        <li><a href="">İlanlar</a></li>
        <li><a href="">İstasyonlar</a></li>
        <li><a href="">Profilim</a></li>
    @else
        <li><a href="{{ route('login') }}">Giriş Yap</a></li>
        <li><a href="{{ route('register') }}">Kayıt Ol</a></li>
    @endif
</ul>

@yield('content')

</body>
</html>
