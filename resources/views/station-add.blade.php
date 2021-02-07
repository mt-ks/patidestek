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

                <select data-page="{{ route('region.town',['cityId' => -1]) }}" id="cities_select"
                        class="browser-default">
                    <option value="">İl seçiniz...</option>
                    @foreach($city as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>

                <select id="town_select" data-page="{{ route('region.district',['townId' => -1]) }}"
                        class="browser-default mt-1" style="margin-bottom: 10px">
                    <option value="">İlçe seçiniz...</option>
                </select>


                <input type="text" id="stationName" placeholder="Istasyon adı" autocomplete="off">

                <label>Lütfen açıklamada tam adres belirtiniz.</label>

                <textarea name="editor1"></textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
                <button type="submit" class="btn blue mt-1" id="shareStation">PAYLAŞ</button>
            </div>
        </div>
    </div>

    <script>
        let latitude, longitude;
        getLocation();

        function getLocation() {
            let auth = false;
            navigator.geolocation.watchPosition(function (position) {
                    if (auth === false) {
                        auth = true;
                        showPosition(position);
                    }
                    $("div#addArea").css({display: 'block'});
                },
                function (error) {
                    if (error.code === error.PERMISSION_DENIED)
                        $("div#blockArea").css({display: 'block'});
                    $("div#addArea").css({display: 'none'});
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

        $("body").delegate("button#currentLocation", 'click', function () {
            $("iframe#gmap_canvas").attr("src", "https://maps.google.com/maps?q=" + latitude + ', ' + longitude + "&t=&z=17&ie=UTF8&iwloc=&output=embed");
        })

        $("body").delegate('input#searchQuery', 'keydown', function (data) {
            let val = $(this).val();
            $("iframe#gmap_canvas").attr("src", "https://maps.google.com/maps?q=" + val + "&t=&z=17&ie=UTF8&iwloc=&output=embed");
        })

        $("button#shareStation").on('click', function (e) {

            e.preventDefault();
            let name = $("input#stationName").val();
            let location = $("input#searchQuery").val();
            let city_id = $("select#cities_select").val();
            let town_id = $("select#town_select").val();
            if (name === '')
            {
                toast('Istasyon adı gerekli!')
                return;
            }

            if (location === '')
            {
                location = latitude + ', ' + longitude;
            }

            if (!parseInt(town_id) > 0)
            {
                toast('Lütfen il seçiniz.')
                return;
            }


            if (!parseInt(city_id) > 0)
            {
                toast('Lütfen ilçe seçiniz.')
                return;
            }



            let description = CKEDITOR.instances['editor1'].getData();

            if (description == '')
            {
                toast('Lütfen açıklama metni giriniz.');
                return;
            }

            request(null,{address : '{{ route('station.add') }}', data : {name,location,description,city_id,town_id} });

        })
    </script>

@endsection
