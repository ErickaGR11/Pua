@extends('layouts.guest')

@section('content')
<style>
    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 80px);
    }

    .register-card {
        width: 100%;
        max-width: 500px;
        border-radius: 15px;
        padding: 2rem;
        background-color: white;
        box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,0.1);
    }

    .register-card .logo {
        display: flex;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .register-card .logo img {
        width: 80px;
    }

    .register-title {
        text-align: center;
        font-weight: bold;
        font-size: 1.5rem;
        color: #bd1553;
        margin-bottom: 1.5rem;
        font-family: 'Instrument Sans', sans-serif;
    }

    .btn-primary {
        width: 100%;
    }

    .already-registered {
        display: block;
        margin-top: 0.75rem;
        text-align: center;
        font-size: 0.9rem;
    }
</style>

<div class="container register-container">
    <div class="register-card">
        
        <div class="register-title">{{ __('Registro de Usuario') }}</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Nombre completo') }}</label>
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autofocus>

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required>

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
                       name="password" required>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">{{ __('Confirmar contraseña') }}</label>
                <input id="password-confirm" type="password"
                       class="form-control" name="password_confirmation" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary border-0" style="background-color: #bd1553; color: white;">
                    {{ __('Registrarse') }}
                </button>
            </div>

            <a class="already-registered" href="{{ route('login') }}">
                {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
            </a>
        </form>
    </div>
</div>
@endsection
