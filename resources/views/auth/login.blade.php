@extends('layouts.guest')

@section('content')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
<style>
    .login-card {
        background: #ffffff;
        border: none;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        padding: 2rem;
    }

    .login-header {
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        color: #bd1553;
        margin-bottom: 1.5rem;
        font-family: 'Instrument Sans', sans-serif;
    }

    .login-logo {
        display: flex;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .btn-primary {
        width: 100%;
    }

    .form-check-label {
        font-size: 0.9rem;
    }

    .text-end {
        text-align: end;
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card login-card">
                
                <div class="login-header fw-bold">{{ __('Inicio de sesión') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Recordarme') }}
                            </label>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary border-0" style="background-color: #bd1553; color: white;">
                                {{ __('Ingresar') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-end">
                                <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
