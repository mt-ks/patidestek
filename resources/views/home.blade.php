@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 35px">
        <div class="row">


            <div class="col s12 m3">
                <div class="card nice_shadow">
                    <div class="card-content d-flex">
                        <div>
                            <img src="{{ auth()->user()->avatar }}" alt="" width="80px" class="main_avatar">
                        </div>
                        <div style="margin-left: 18px;margin-top: auto;margin-bottom: auto">
                            <h5>{{ auth()->user()->name }}</h5>
                            <label for="">{{ auth()->user()->email }}</label> <br>
                            <label for="">Onur Puanı: {{ auth()->user(->honor_points)}}</label>
                        </div>
                    </div>
                    <a href="{{ route('user.profile.edit') }}" class="btn pink" style="width: 100%">Profili Düzenle</a>
                </div>

                <div class="card nice_shadow">
                    <div class="card-content">
                        <label>Filtreler</label>

                        <select data-page="{{ route('region.town',['cityId' => -1]) }}" id="cities_select"
                                class="browser-default">
                            <option value="">Şehir seçiniz...</option>
                            @foreach($city as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>

                        <select id="town_select" data-page="{{ route('region.district',['townId' => -1]) }}"
                                class="browser-default mt-1">
                            <option value="">İlçe seçiniz...</option>
                        </select>


                        <button class="btn blue mt-1" style="width: 100%">ARA</button>

                    </div>
                </div>
            </div>

            <div class="col s12 m7">

                <div class="col s12 m12">
                    <div class="card nice_shadow">
                        <div class="card-content">
                            <a href="{{ route('station.add') }}" type="submit" class="btn  pink">Istasyon
                                Ekle</a>
                        </div>
                    </div>
                </div>


                @foreach($stations as $station)
                    <div class="col s12 m12">
                        <div class="card nice_shadow">
                            <div class="card-content">
                                <div class="post-owner d-flex">
                                    <img
                                        src="{{ $station->user->avatar }}"
                                        class="radius-full" width="50px" alt="">
                                    <div style="margin:auto 0 auto 8px;">
                                        {{ $station->user->name }} {{ $station->user->surname }}
                                        @if($station->user->is_verified === 1)
                                            <img  src="{{ asset('assets/images/verified.png') }}" style="width: 15px; margin-top: auto" alt="">
                                        @endif
                                        <br>
                                        <label>{{ $station->created_at }}</label>
                                    </div>
                                </div>
                                <div class="post-content mt-1" style="font-size: 20px">
                                    <p>{{ $station->name }}</p>
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            <iframe width="600" height="500" id="gmap_canvas"
                                                    src="https://maps.google.com/maps?q={{ $station->location }}&t=&z=17&ie=UTF8&iwloc=&output=embed"
                                                    frameborder="0" scrolling="no" marginheight="0"
                                                    style="width: 100%;min-width: 100%"
                                                    marginwidth="0"></iframe>
                                            <style>.mapouter {
                                                    position: relative;
                                                    text-align: right;
                                                    height: 500px;
                                                    width: 100%;
                                                }</style>
                                            <style>.gmap_canvas {
                                                    overflow: hidden;
                                                    background: none !important;
                                                    height: 500px;
                                                    width: 100%;
                                                }</style>
                                        </div>
                                    </div>
                                </div>
                                <div class="action-area mt-1">
                                    <a href="{{ route('station.get',['id' => $station->id]) }}" class="btn blue"
                                       style="width: 100%">Detaylar</a>
                                    {{--                                    <a style="margin-left: 10px;">Yorum yap</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col s12 m2">
                <div class="d-flex" style="height: 450px;background: #433efe;margin-top: 10px;border-radius: 10px">
                    <div style="margin: auto; color: white; font-size: 25px">
                        REKLAM
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
