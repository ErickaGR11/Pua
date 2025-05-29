@extends('layouts.app')
@section('title', 'Dashboard')
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

    <link rel="stylesheet" href="https://reprints-oriented-venture-memories.trycloudflare.com/css/styles.css">

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

    <div class="container py-4">
        <h2 class="fw-bold mb-4">Buen día, {{ Auth::user()->name }}! </h2>
        <p class="text-muted">Esto es lo que está pasando con tu tienda hoy</p>
        

        <div class="row g-3 mb-4">
            <div class="col-md-4">
            <div class="p-3 bg-light rounded shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                <div>
                    <i class="bi bi-box fs-3 text-primary"></i>
                </div>
                <div class="text-end">
                    <h5 class="mb-0">{{ $stockTotal }}</h5>
                    <p class="mb-0 text-muted">Stock total</p>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="p-3 bg-light rounded shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                <div>
                    <i class="bi bi-bag-check fs-3 text-success"></i>
                </div>
                <div class="text-end">
                    <h5 class="mb-0">{{ $productosVendidos }}</h5>
                    <p class="mb-0 text-muted">Total productos vendidos</p>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="p-3 bg-light rounded shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                <div>
                    <i class="bi bi-person fs-3"></i>
                </div>
                <div class="text-end">
                    <h5 class="mb-0">{{ $usuariosRegistrados }}</h5>
                    <p class="mb-0 text-muted">Usuarios registrados</p>
                </div>
                </div>
            </div>
            </div>
            
        </div>

        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <h5 class="fw-bold fs-3" style="color: rgb(27, 87, 189)">Ventas</h5>
            <p class="text-muted">Visualiza información sobre tus ventas</p>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h1 id="totalVentas" class="fw-bold">${{ number_format($total, 2) }}</h1>
            </div>

            <div class="d-flex gap-3 mb-3">
                <button class="btn btn-outline-dark btn-sm filtro-ventas" data-periodo="1d">1d</button>
                <button class="btn btn-outline-dark btn-sm filtro-ventas" data-periodo="7d">7d</button>
                <button class="btn btn-outline-dark btn-sm filtro-ventas" data-periodo="30d">30d</button>
                <button class="btn btn-outline-dark btn-sm filtro-ventas" data-periodo="12m">12m</button>
                <button class="btn btn-outline-dark btn-sm filtro-ventas" data-periodo="max">Max</button>
            </div>
        </div>

        <div class="bg-white rounded shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Últimas ventas</h5>
            <input type="text" id="buscadorVentas" class="form-control w-25" placeholder="Search">
            </div>
            <table class="table table-hover">
            <thead>
                <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Precio</th>
                </tr>
            </thead>
            <tbody>
               @foreach($ultimasVentas as $venta)
                @foreach($venta->detalles as $detalle)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $detalle->producto->nombre ?? 'N/A' }}</td>
                        <td>{{ $venta->created_at->format('d/m/Y') }}</td>
                        <td>${{ number_format($venta->precio_total, 2) }}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
 <!-- 
    <div class="container py-4">
        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <h5 class="fw-bold fs-3" style="color: rgb(183, 25, 25)">Gastos</h5>
            <p class="text-muted">Visualiza información sobre tus gastos </p>
            <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="fw-bold">$4,435.70</h1>
            <span class="text-success">$2,330.00 (+2.5%)</span>
            </div>

            <div class="d-flex gap-3 mb-3">
            <button class="btn btn-outline-dark btn-sm active">1d</button>
            <button class="btn btn-outline-dark btn-sm">7d</button>
            <button class="btn btn-outline-dark btn-sm">30d</button>
            <button class="btn btn-outline-dark btn-sm">12m</button>
            <button class="btn btn-outline-dark btn-sm">Max</button>
            </div>

            
            <div class="bg-light rounded p-5 text-center text-muted">
            [Graph Placeholder]
            </div>
        </div>

        <div class="bg-white rounded shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Last transaction</h5>
            <input type="text" class="form-control w-25" placeholder="Search">
            </div>
            <table class="table table-hover">
            <thead>
                <tr>
                <th>Order ID</th>
                <th>Item</th>
                <th>Date</th>
                <th>Price</th>
                <th>Platform</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>1</td>
                <td>Crop top pants</td>
                <td>12/02/2022</td>
                <td>$599</td>
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Shopee_logo.svg/1280px-Shopee_logo.svg.png" alt="Shopee" width="20"></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div> -->
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     $(document).ready(function () {
        $('#buscadorVentas').on('keyup', function () {
            const valor = $(this).val().toLowerCase();

            $('table tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
            });
        });
    });
   
    
   document.querySelectorAll('.filtro-ventas').forEach(btn => {
        btn.addEventListener('click', function () {
            const periodo = this.dataset.periodo;
            // Opcional: muestra un loader mientras carga
            const totalVentas = document.getElementById('totalVentas');
            const valorAnterior = totalVentas.textContent;
            totalVentas.textContent = "...";

            fetch(`/admiDashboard/ventas?periodo=${periodo}`)
                .then(res => {
                    if (!res.ok) throw new Error('Error de red');
                    return res.json();
                })
                .then(data => {
                    totalVentas.textContent = `$${data.total}`;
                })
                .catch(error => {
                    totalVentas.textContent = valorAnterior;
                    alert('Error al obtener datos');
                    console.error(error);
                });
                 $('.filtro-ventas').removeClass('active');
                 $(this).addClass('active');
            });
        });
    

</script>

 @endsection