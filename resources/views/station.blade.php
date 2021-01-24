@extends('layouts.app')
@section('content')
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="600" height="500" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=38.386689, 27.115834&t=&z=17&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0"
                    style="width: 100%;min-width: 100%"
                    marginwidth="0"></iframe>
            <a href="https://fmovies2.org"></a><br>
            <style>.mapouter {
                    position: relative;
                    text-align: right;
                    height: 500px;
                    width: 100%;
                }</style>
            <a href="https://google-map-generator.com">google-map-generator.com</a>
            <style>.gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 500px;
                    width: 100%;
                }</style>
        </div>
    </div>
    <div class="container">
        <div class="card nice_shadow">
            <div class="card-content">
                <h3 class="center thin">Balçova Istasyon</h3>
                <p>Balçova istasyon</p>
            </div>
        </div>
    </div>
@endsection
