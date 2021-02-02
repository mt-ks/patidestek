@extends('layouts.app')
@section('content')
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
                    width: 100%; }</style>
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
                <h3 class="center thin">{{ $station->name }}</h3>
                <p>{!! $station->description !!}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <label>Yorumlar</label>
        @foreach($comments as $comment)
        <div class="card nice_shadow">
            <div class="card-content">
                    <div class="post-owner d-flex">
                        <img
                            src="{{ $comment->user->avatar }}"
                            class="radius-full" width="50px" alt="">
                        <div style="margin:auto 0 auto 8px;">
                            {{ $comment->user->name }} {{ $comment->user->surname }}<br>
                            <label>{{ $comment->created_at }}</label>
                        </div>
                    </div>
                    <p style="padding: 10px">{{ $comment->comment }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container">
        <div class="card nice_shadow">
            <div class="card-content">
                <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

                <textarea id="comment" style="height: 200px" placeholder="Yorum yazınız..."></textarea>
                <input type="hidden" id="station_id" value="{{ $station->id }}">
                <button type="submit" class="btn blue" id="addComment">Paylaş</button>
            </div>
        </div>
    </div>
    <script>
        $(function (){
            $("button#addComment").on('click',function (e){
                let comment = $("textarea#comment").val();
                let station_id = parseInt($("input#station_id").val());
                if (station_id === 0)
                {
                    toast('Geçersiz format')
                    return;
                }
                if (comment === '' && comment.length < 3)
                {
                    toast('Lütfen yorum yazınız.')
                    return;
                }

                request(null, {address: '{{ route('comment.add') }}', data:{comment,station_id}});
            })
        });
    </script>
@endsection
