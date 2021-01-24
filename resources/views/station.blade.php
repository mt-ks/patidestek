@extends('layouts.app')
@section('content')
    <div class="mapouter">
        <div class="gmap_canvas">
            {!! \App\Classes\GoogleIframeBuilder::build('Balçova mine sokak') !!}
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

    <script>
        getLocation();
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            console.log(position);

        }
    </script>
@endsection
