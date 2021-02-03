@extends('layouts.app')

@section('content')
    <div class="row d-flex">
        <div class="col s12 m4" style="margin-left: auto; margin-right: auto">
            <div class="card nice_shadow" style="margin-top: 30px">
                <div class="card-content">
                    <label>Profili Düzenle</label><br>
                    <div class="d-flex">
                        <div style="margin-left: auto;margin-right: auto">
                            <img src="{{ auth()->user()->avatar }}" class="radius-full center" width="80px" height="80px" alt=""
                                 style="margin-right: auto; margin-left: auto">
                        </div>
                    </div>
                    @error('avatar')<script>$(function () {toast('{{ $message }}')})</script>@enderror
                    <form action="{{ route('upload.avatar') }}" method="post" id="changeAvatar" enctype="multipart/form-data">
                        @csrf
                        <div class="file-field input-field">
                            <div class="btn blue">
                                <span>Profil Fotoğrafı</span>
                                <input type="file" name="avatar">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text"
                                       placeholder="Lütfen yeni profil fotoğrafınızı seçiniz..." id="profileContent">
                            </div>
                        </div>
                    </form>
                    <script>
                       $(function (){
                           $("input#profileContent").on('change', function () {
                               $("form#changeAvatar").submit();
                           });
                       });
                    </script>
                    <form action="{{ route('user.profile._edit') }}" method="post" class="submit">
                        @csrf
                        <div class="mt-1" style="margin-top: 20px">
                            <input type="email" placeholder="E-Posta" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <div class="mt-1">
                            <input type="text" placeholder="Adınız" name="name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="mt-1">
                            <input type="text" placeholder="Soyadınız" name="surname"
                                   value="{{ auth()->user()->surname }}">
                        </div>
                        <div class="mt-1">
                            <input type="text" placeholder="Telefon numaranız" name="phone"
                                   value="{{ auth()->user()->phone }}">
                        </div>
                        <div class="mt-1">
                            <select name="gender" class="browser-default" id="" style="margin-bottom: 10px">
                                <option value="2" @if(auth()->user()->gender === 2) selected @endif>Kadın</option>
                                <option value="1" @if(auth()->user()->gender === 1) selected @endif>Erkek</option>
                            </select>
                        </div>

                        <button type="submit" class="btn blue">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
