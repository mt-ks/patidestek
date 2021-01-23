@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex" style="width: 850px; max-width: 100%">
        <div class="col s12 m6" style="margin-left: auto; margin-right: auto; margin-top: 50px">
            <div class="card nice_shadow">
                <div class="card-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <script>$(function () {
                                        toast('{{ $message }}')
                                    })</script>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <script>$(function () {
                                        toast('{{ $message }}')
                                    })</script>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <script>$(function () {
                                        toast('{{ $message }}')
                                    })</script>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone">Telefon numaranız</label>
                            <input id="phone" name="phone" type="text" placeholder="Telefon numaranız" required>
                        </div>


                        <div class="form-group row">
                            <label for="phone">Cinsiyet</label>
                            <select name="gender" class="browser-default" id="">
                                <option value="">Erkek</option>
                                <option value="">Kadın</option>
                            </select>
                        </div>

                        <div></div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn blue" style="width: 100%">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card nice_shadow">
                <div class="card-content" style="text-align: center">
                    <label>
                        Kayıt olarak kullanıcı sözleşmesini ve gizlilik politikasını kabul etmiş sayılırsınız.
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
