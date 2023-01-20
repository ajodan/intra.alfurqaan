<!DOCTYPE html>
<html lang="en">

<head>
    <title>INTRA AL-FURQAAN - LOGIN</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Web Intra Masjid Al Furqaan, Dibuat dengan laravel-8" />
    <meta name="keywords" content="web,app,laravel,school" />
    <meta name="author" content="Eksel Corp" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('templates/backend/datta-lite') }}/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('templates/backend/datta-lite') }}/assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('templates/backend/datta-lite') }}/assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('templates/backend/datta-lite') }}/assets/css/style.css">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="mb-4">
                            <i class="feather icon-unlock auth-icon"></i>
                        </div>
                        <h3 class="mb-4">LOGIN INTRA</h3>
                        @include('layouts.components.alert-dismissible')
                        <div class="input-group mb-3">
                            <input required="" name="username" type="" class="form-control @error('username') is-invalid @enderror" placeholder="username">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="input-group mb-4">
                            <input required="" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary shadow-2 mb-4">L O G I N</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Js -->
    <script src="{{ asset('templates/backend/datta-lite') }}/assets/js/vendor-all.min.js"></script>
    <script src="{{ asset('templates/backend/datta-lite') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>