@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex" style="width: 850px; max-width: 100%">
            <div class="col s12 m6" style="margin-left: auto; margin-right: auto; margin-top: 50px">
                <div class="card nice_shadow">

                    <div class="card-content">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <script>$(function () {
                                            toast('{{ $message }}')
                                        })</script>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <script>$(function () {
                                            toast('{{ $message }}')
                                        })</script>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div style="margin-left: 5px">
                                    <div class="form-check">

                                        <label>
                                            <input type="checkbox" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                            <span>{{ __('Remember Me') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn blue" style="width: 100%">
                                {{ __('Login') }}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card nice_shadow">
                    <div class="card-content">
                        @if (Route::has('password.request'))
                            <a class="" href="{{ route('password.request') }}">
                                <label for="" style="cursor: pointer">Şifremi unuttum?</label>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
