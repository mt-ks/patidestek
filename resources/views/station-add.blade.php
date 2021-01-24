@extends('layouts.app')

@section('content')



    <div class="container" style="display: none" id="blockArea">
        <div class="card nice_shadow">
            <div class="card-content">
                <h4 class="thin center">Lütfen Konumunuza izin verin...</h4>
            </div>
        </div>
    </div>

    <div class="container" style="display: none" id="addArea">
        <div class="card nice_shadow">
            <div class="card-content">
                <div id="mapArea"></div>
                <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

                <textarea name="editor1"></textarea>
                <script>
                    CKEDITOR.replace( 'editor1' );
                </script>
                <button type="submit" class="btn blue mt-1">PAYLAŞ</button>
            </div>
        </div>
    </div>

    <script>
        let latitude, longitude;
        getLocation();
        function getLocation() {
            let auth = false;
            navigator.geolocation.watchPosition(function(position) {
                if (auth === false)
                {
                    auth = true;
                    showPosition(position);
                }
                    $("div#addArea").css({display:'block'});
                },
                function(error) {
                    if (error.code === error.PERMISSION_DENIED)
                        $("div#blockArea").css({display:'block'});
                        $("div#addArea").css({display:'none'});
                });

        }

        function showPosition(position) {
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            $("div#mapArea").html(`
                   <div class="d-flex"><input type="text" id="searchQuery" placeholder="Konum arayın..." autocomplete="off">
                    <button id="currentLocation" class="btn blue">KONUMUM</button></div>
                   <iframe width="600" height="500"  id="gmap_canvas"
                    src="https://maps.google.com/maps?q=${latitude}, ${longitude}&t=&z=17&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0"
                    style="width: 100%;min-width: 100%"
                    marginwidth="0"></iframe>`)
        }

        $("body").delegate("button#currentLocation",'click',function (){
            $("iframe#gmap_canvas").attr("src","https://maps.google.com/maps?q="+latitude +', ' + longitude+"&t=&z=17&ie=UTF8&iwloc=&output=embed");
        })

        $("body").delegate('input#searchQuery','keydown',function (data){
            let val = $(this).val();
            $("iframe#gmap_canvas").attr("src","https://maps.google.com/maps?q="+val+"&t=&z=17&ie=UTF8&iwloc=&output=embed");
        })
    </script>

@endsection
