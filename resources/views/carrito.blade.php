@extends('layouts.app')
@section('title', 'Resumen de compra ') 
@section('content')
 <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

     <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://carriers-presidential-honolulu-listings.trycloudflare.com/css/styles.css">

<style>
    .card { 
        border-radius: 18px; 
    }
    @media (max-width: 991.98px) {
        .order-summary-col {
            margin-top: 2rem;
        }
    }
</style>
     <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                 @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif  
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-start mb-3">
            <a href="javascript:history.back()" class="text-dark"><i class="bi bi-arrow-left fs-4"></i></a>
        </div>
        <div class="row justify-content-center g-4">
        <!--Resumen de Pedido -->
            <div class="col-12 order-summary-col">
            <div class="card p-4 bg-soft">
            <div class="card p-4 bg-soft">
                @if ($carritoItems->isEmpty())
                    <div class="text-center py-5">
                        <h5 class="text-muted">Aún no hay productos en el carrito.</h5>
                        <button class="btn btn-outline-secondary w-100 mt-3 py-2" style="font-size:1.08rem; border-radius:10px;" disabled>
                            Realizar Pedido
                        </button>
                    </div>
                @else
                    @php $total = 0; @endphp

                    @foreach ($carritoItems as $item)
                        @php
                            $subtotal = $item->cantidad * $item->precio_unitario;
                            $total += $subtotal;
                        @endphp

                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-light d-flex justify-content-center align-items-center" style="width:68px;height:68px;border-radius:12px;">
                                <img src="{{ asset($item->producto->url_imagen) }}" alt="{{ $item->producto->nombre }}" style="max-width: 100%; max-height: 100%; border-radius: 10px;">
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <div class="fw-semibold d-flex justify-content-between align-items-center" style="font-size:17px">
                                    {{ $item->producto->nombre }}
                                    <span>${{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="text-muted" style="font-size:15px">
                                    {{ $item->cantidad }} unidad{{ $item->cantidad > 1 ? 'es' : '' }}
                                </div>
                            </div>

                            <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-link text-danger p-0 ms-4" onclick="return confirm('¿Desea eliminar este producto?')">
                                    <i class="bi bi-trash fs-5"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold fs-4">Total</span>
                        <span class="fw-bold fs-4">${{ number_format($total, 2) }}</span>
                    </div>

                    <a href="{{ route('detalleCompra') }}" class="btn btn-outline4 w-100 mt-3 py-2" style="font-size:1.08rem; border-radius:10px;">
                        Ir a finalizar pedido
                    </a>
                @endif
            </div>


        </div>
        </div>
    </div>


 @endsection