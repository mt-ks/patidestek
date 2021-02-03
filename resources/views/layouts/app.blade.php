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
    <script src="{{ asset('assets/js/app.js?v=1') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>


<nav class="custom_menu nice_shadow">
    <div class="nav-wrapper container">
        <a href="{{ route('main') }}" class="brand-logo black-text d-flex"><img
                src="{{ asset('assets/images/logo2.png') }}" alt="" style="width: 48px;margin-top: 1px"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            @if(auth()->check())
                <li><a href="{{ route('main') }}">Anasayfa</a></li>
                <li><a href="{{ route('user.profile') }}">İstasyonlarım</a></li>
                <li><a href="{{ route('user.profile.edit') }}">Profilimi Düzenle</a></li>
                <li><a href="#logoutModal" class="modal-trigger">Çıkış Yap</a></li>
            @else
                <li><a href="{{ route('login') }}">Giriş Yap</a></li>
                <li><a href="{{ route('register') }}">Kayıt Ol</a></li>
            @endif
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    @if(auth()->check())
        <li><a href="{{ route('main') }}">Anasayfa</a></li>
        <li><a href="{{ route('user.profile') }}">İstasyonlarım</a></li>
        <li><a href="{{ route('user.profile.edit') }}">Profilimi Düzenle</a></li>
        <li><a href="#logoutModal" class="modal-trigger">Çıkış Yap</a></li>
    @else
        <li><a href="{{ route('login') }}">Giriş Yap</a></li>
        <li><a href="{{ route('register') }}">Kayıt Ol</a></li>
    @endif
</ul>

@yield('content')


<div id="loadingModal" class="modal">
    <div class="center loading_center">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="logoutModal" class="modal" style="width: 350px!important;">
    <div class="modal-content">
        <h4 class="thin center">Çıkış Yap</h4>
        <p class="center">Çıkış yapmak istediğinize emin misiniz?</p>
    </div>
    <form action="{{ route('logout') }}" id="logoutForm" method="post">
        @csrf
    </form>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">IPTAL</a>
        <button type="submit" form="logoutForm" class="modal-close waves-effect waves-green btn-flat left">Evet</button>
    </div>
</div>

</body>
</html>
