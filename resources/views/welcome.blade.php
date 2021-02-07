@extends('layouts.app')
@section('content')
    <style>
        .hback{
            background-color: transparent; /* For browsers that do not support gradients */
            background-image: linear-gradient(#fff, transparent);
        }
    </style>
    <div id="index-banner" class="parallax-container hback">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center black-text text-lighten-2">PatiDestek</h1>
                <div class="row center">
                    <h5 class="header col s12 light black-text">Kayıt olun ve istasyon ekleyerek sokak hayvanlarına yardım edin!</h5>
                </div>
                <div class="row center">
                    @auth
                        <a href="{{ route('station.add') }}" class="btn-large waves-effect waves-light blue lighten-1">Istasyon Ekle</a>
                    @else
                        <a href="{{ route('register') }}" class="btn-large waves-effect waves-light blue lighten-1">Kayıt Ol</a>
                        <a href="{{ route('login') }}" class="btn-large waves-effect waves-light blue">Giriş Yap</a>
                    @endauth
                </div>
                <br><br>

            </div>
        </div>
        <div class="parallax"><img src="https://s1.1zoom.me/big0/839/352119-admin.jpg" alt="Unsplashed background img 1"
                                   style="transform: translate3d(-50%, 378.905px, 0px); opacity: 1; bottom: 220px!important;"></div>
    </div>

    <div class="container">
        <div class="card nice_shadow">
            <div class="card-content">
                <h5>Son Eklenen Istasyonlar</h5>
            </div>
        </div>
        <div class="row">
            @foreach($stations as $station)
                <div class="col s12 m4">
                    <div class="card nice_shadow">
                        <div class="card-content" style="text-align: center">
                            <div class="post-owner d-flex">
                                <img
                                    src="{{ $station->user->avatar }}"
                                    class="radius-full" width="50px" alt="">
                                <div style="margin:auto 0 auto 8px;">
                                    {{ $station->user->name }} {{ $station->user->surname }}
                                    @if($station->user->is_verified === 1)
                                        <img  src="{{ asset('assets/images/verified.png') }}" style="width: 15px; margin-top: auto" alt="">
                                    @endif
                                </div>
                            </div>
                            <br>

                            {!! \App\Classes\GoogleIframeBuilder::build($station->location) !!}
                            <a href="" class="black-text" style="font-size: 23px">{{ $station->name }}</a>
                            <a href="{{ route('station.get',['id' => $station->id]) }}" class="btn blue" style="display: block;margin-top: 8px">Detaylar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="card nice_shadow">
            <div class="card-content">
                <h6 class="thin">Ekibimiz</h6>
            </div>
        </div>

        <div class="row">
            @foreach($developers as $developer)
                <div class="col s6 m4">
                    <div class="card nice_shadow">
                        <div class="card-content">
                            <center>
                                <img style="width:150px" class="radius-full" src="{{ $developer['avatar'] }}" alt="">
                            </center>
                            <h5 class="center thin">{{ $developer['name'] }}</h5>
                            <p class="center"><i>{{ $developer['role'] }}</i></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <footer class="page-footer blue">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">PatiDestek</h5>
                    <p class="grey-text text-lighten-4">
                        Patidestek projemize destek olmak için kayıt olun <br> ve istasyonlara yardım edin!
                    </p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Hızlı Erişim</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="https://instagram.com/1patidestek" target="_blank">Instagram</a></li>
                        <li><a class="grey-text text-lighten-3" href="https://twitter.com/destekpati" target="_blank">Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2021 pati
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>

@endsection
