@extends('layouts.app')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons (opcional) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{ __('Información del perfil') }}</h4>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{ __('Cambiar contraseña') }}</h4>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3 text-danger">{{ __('Eliminar cuenta') }}</h4>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
