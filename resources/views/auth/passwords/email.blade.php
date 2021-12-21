@extends('layouts.app', ['activePage' => 'reset', 'title' => 'Reset Password'])

@section('content')
    <div class="full-page section-image" data-color="black" data-image="{{ asset('img/full-screen-image-2.jpg') }}">
        
        <div class="content pt-5">
            <div class="container mt-5">    
                <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                    <form class="form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="card card-login card-hidden">
                            <div class="card-header ">
                                <h3 class="header text-center">{{ __('auth.resetPassword') }}</h3>
                            </div>
                            <div class="card-body ">
                                <div class="form-group">
                                    <label for="email" class="col-md-6 col-form-label">{{ __('auth.email') }}</label>
        
                                    <div class="col-md-14">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', '') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <div class="container text-center" >
                                        <button type="submit" class="btn btn-warning btn-wd">{{ __('auth.sendResetLink') }}</button>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-link" style="color:#23CCEF" href="{{ route('login') }}">{{ __('auth.login') }}
                                        </a>
                                        @if(config('dex.enableRegister'))
                                            <a class="btn btn-link" style="color:#23CCEF" href="{{ route('register') }}">
                                                {{ __('auth.register') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 300)
        });
    </script>
@endpush