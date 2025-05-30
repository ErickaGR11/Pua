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
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://reprints-oriented-venture-memories.trycloudflare.com/css/styles.css">

<style>
    .card { 
        border-radius: 18px; 
    }
    .form-check-input:checked { 
        border-color: #209b59; 
        background-color: #209b59; 
    }
    .form-check-input {
        position: relative;
        margin-left: 0;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        left: 10px;
    }
    .form-check {
        display: block;
        padding-left: 0;
    }
    .form-check-label {
        width: 100%;
        margin-left: 1.8rem;
    }
    .whatsapp-bg { 
        border: 2px solid #209b59 !important; 
        background: #daede2 !important; 
    }
    .icon-circle {
        border-radius: 50%;
        border: 1px solid #efede675;
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        background: #fff;
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
        <!-- Columna izquierda: Formulario -->
        <div class="col-12 col-lg-7">
            <div class="card p-4 border-0 bg-white">
                <!-- Contacto -->
                <div class="mb-4">
                    <h4 class="fw-bold mb-3">Contacto</h4>
                    <p class="text-muted mb-3">Por favor, verifica que la información sea correcta y este actualizada. Esta información se utilizará para coordinar la entrega y el pago de tu pedido.</p>
                    <label class="form-label mt-2">Nombre</label>
                    <input type="text" class="form-control mb-2" placeholder="Ingresa tu nombre" value="{{ Auth::user()->name }}">
                    <label class="form-label mt-2">Teléfono celular</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text"><img src="https://cdn.jsdelivr.net/npm/flag-icons/flags/4x3/mx.svg" width="22"/></span>
                        <input id="tel" type="text" class="form-control" placeholder="Ingresa tu teléfono celular" value="{{ Auth::user()->telefono }}">
                    </div>
                    <label class="form-label mt-2">Correo electrónico</label>
                    <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" value="{{ Auth::user()->email }}">
                </div>

               <!-- Entrega -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Entrega</h6>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="entrega" id="retiroTienda">
                      <label class="form-check-label d-flex align-items-center" for="retiroTienda">
                          <span class="icon-circle me-2"><i class="bi bi-shop"></i></span> Retirar en Tienda
                      </label>
                      <div class="border rounded-3 px-3 py-2 mt-2 whatsapp-bg small" id="infoTienda" style="display:none;">
                          Puedes recoger tu pedido en nuestra tienda física una vez que esté listo. Te notificaremos vía WhatsApp o correo electrónico.
                          <br>
                          Dirección: Av. Pedro Coronel 51, Lomas de Bernardez, 98610 Guadalupe, Zac.
                      </div>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="entrega" id="coordWhatsapp" checked>
                      <label class="form-check-label d-flex align-items-center" for="coordWhatsapp">
                          <span class="icon-circle me-2"><i class="bi bi-whatsapp" style="color:#25d366"></i></span> Coordinar por WhatsApp
                      </label>
                      <div class="border rounded-3 px-3 py-2 mt-2 whatsapp-bg small" id="infoWhatsapp">
                          Al realizar el pedido podrás comunicarte por WhatsApp para coordinar la entrega.
                      </div>
                    </div>
                </div>

                <!-- Pago -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Pago</h6>
                    
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="pago" id="transferencia" checked>
                      <label class="form-check-label d-flex align-items-center" for="transferencia">
                          <span class="icon-circle me-2"><i class="bi bi-bank"></i></span> Transferencia o Depósito
                      </label>
                      <div class="border rounded-3 px-3 py-2 mt-2 whatsapp-bg small" id="infoTransferencia">
                          Al realizar el pedido se te enviará al <b>correo electrónico</b> los datos para realizar el pago mediante transferencia o depósito bancario.
                      </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Columna derecha: Resumen de Pedido -->
       <div class="col-12 col-lg-5 order-summary-col">
            <div class="card p-4 bg-soft">
                @php $total = 0; @endphp
                @foreach ($carritoItems as $item)
                    @php
                        $subtotal = $item->cantidad * $item->precio_unitario;
                        $total += $subtotal;
                    @endphp
                    <div class="d-flex align-items-center mb-2">
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
                    </div>
                @endforeach
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold">${{ number_format($total, 2) }}</span>
                </div>
                <form id="formVenta" action="{{ route('venta.agregar') }}" method="POST" onsubmit="return confirmarPedido(event)">
                    @csrf
                    <button type="submit" class="btn btn-outline4 w-100 mt-3 py-2" style="font-size:1.08rem; border-radius:10px;">
                        Realizar Pedido
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- JS para mostrar/ocultar info según opción -->
<script>
   function confirmarPedido(event) {
        event.preventDefault(); // evita que el formulario se envíe automáticamente

        const telefono = document.getElementById('tel').value.trim();

        if (telefono === "" || telefono.length < 10) {
            Swal.fire({
                icon: 'warning',
                title: 'Número de teléfono inválido',
                text: 'Por favor, actualiza tu número de teléfono en tu perfil antes de realizar el pedido.',
                confirmButtonColor: '#209b59'
            });
            return false;
        }

        // Mostrar mensaje de éxito
        Swal.fire({
            icon: 'success',
            title: '¡Pedido exitoso!',
            html: 'Se han enviado los detalles de tu compra y el número de cuenta al correo electrónico registrado.<br><br><b>Revisa tu bandeja de entrada y sigue las instrucciones para completar el proceso de pago.</b>',
            confirmButtonText: 'Entendido',
            confirmButtonColor: '#209b59'
        }).then(() => {
            document.getElementById('formVenta').submit(); // enviar el formulario tras confirmar
        });

        return false; // prevenir el envío inmediato
    }


    function updateEntregaInfo() {
        const infos = {
            'retiroTienda': document.getElementById('infoTienda'),
            'coordWhatsapp': document.getElementById('infoWhatsapp')
        };

        for (const key in infos) {
            if (document.getElementById(key).checked) {
                infos[key].style.display = 'block';
            } else {
                infos[key].style.display = 'none';
            }
        }
    }

    document.querySelectorAll('input[name="entrega"]').forEach(el =>
        el.addEventListener('change', updateEntregaInfo)
    );

    // Ejecutar al cargar
    updateEntregaInfo();
</script>

 @endsection