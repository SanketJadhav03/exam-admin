<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Dashlot - Bootstrap 5 Premium Admin & Dashboard Template </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="dashboard,admin,admin template,template dashboard,html css templates,admin panel,bootstrap template,bootstrap dashboard,admin panel dashboard template,admin panel template,html and css,bootstrap 5 dashboard,admin dashboard">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- Choices JS -->
    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Main Theme Js -->
    <script src="../assets/js/authentication-main.js"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

</head>


<div class="page">

    <!-- Start::app-content -->
    <div class="main-content page main-error-page justify-content-center">
        <div class="col-login mx-auto">
            <div class="text-center">
                <a href="index.html">
                    <img src="{{ asset('assets/images/brand-logos/desktop-dark.png') }}"
                        class="header-brand-img custom-logo-light mb-4 desktop-dark" alt="Dashlot logo">
                </a>
                <a href="index.html">
                    <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}"
                        class="header-brand-img custom-logo-dark mb-4 desktop-logo" alt="Dashlot logo">
                </a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-5 justify-content-center mx-auto text-center">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-12">


                                <div class="card-body">
                                    <div class="card-title text-center fw-500 mb-3">LOGIN</div>
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                
                                        <input type="hidden" name="token" value="{{ $token }}">
                
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                
                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Reset Password') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<!-- Custom-Switcher JS -->
<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>

</html>
