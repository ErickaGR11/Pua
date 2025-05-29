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
    
    <style>
        .swiper {
            width: 100%;
            padding-top: 30px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            transition: transform 0.3s ease;
        }

        .swiper-slide-active .custom-card {
            transform: scale(1.1);
            z-index: 10;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.201);
        }

        .swiper-slide-active .custom-card .card-body2 {
            background-color: rgba(0, 0, 0, 0.183);
            color: #ffffff;
            border-radius: 20px 20px 0px 0px;
            display: block;
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

    <div class="container py-4">
        <h2 class="fw-bold mb-4">Top 5</h2>
        <p class="text-muted">Productos mas vendidos </p>
        <div class="swiper mySwiper mt-5">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card text-dark custom-card position-relative overflow-hidden">
                        <!-- Imagen del producto -->
                        <img src="Imagenes/Principal carrusel/img1.jpg" 
                            class="card-img"
                            alt="a"
                            style="height: 450px; object-fit: cover;">
                        <!-- Contenido inferior fijo -->
                        <div class="card-body2 position-absolute bottom-0 w-100 p-3 shadow">
                            <div class="d-flex align-items-center">
                               <div class="align-items-start">
                                    <h4 class="card-title mb-1 fw-bold">a</h4>
                                    <h5 class="card-title mb-1">$1</h5>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    
    
    <div class="container py-4">
        <h2 class="fw-bold mb-4">Productos</h2>
        <p class="text-muted">Crea nuevos, edita, o elimina productos </p>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <input type="text" class="form-control w-100" placeholder="Search">
        </div>
        
        <div class="d-flex gap-3 mb-4">
            <button class="btn btn-outline-dark"> Todos</button>
            <button class="btn btn-outline-dark"> Natural</button>
            <button class="btn btn-outline-dark"> Floral</button>
            <button class="btn btn-outline-dark "> Creativo</button>
            
        </div>

        <div class="row g-3 mb-4">
            <button class="btn btn-primary "> Agregar</button>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <!-- Botón que controla el despliegue -->
                    <div data-bs-toggle="collapse" data-bs-target="#formProducto1" aria-expanded="false" style="cursor: pointer;">
                        <img src="../Imagenes/Principal carrusel/img1.jpg" class="card-img-top" alt="Producto" style="height: 220px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title mb-0 text-center">Nombre del producto</h5>
                        </div>
                    </div>

                    <!-- Contenido oculto con collapse -->
                    <div class="collapse" id="formProducto1">
                        <div class="card-body pt-0">
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" value="Nombre del producto">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea class="form-control" rows="2">Descripción del producto</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Precio</label>
                                <input type="number" class="form-control" value="99.99">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" class="form-control" value="25">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">URL de imagen</label>
                                <div class="input-group">
                                    <input type="text" id="imagenURL" class="form-control" placeholder="Selecciona una imagen" readonly>
                                    <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('fileInput').click();">
                                        Buscar
                                    </button>
                                </div>
                                <input type="file" id="fileInput" accept="image/*" style="display: none;" onchange="handleFile(this)">
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-danger me-3"><i class="bi bi-trash-fill"></i> Eliminar</button>
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
 
    </div>   

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Script -->
    <script>
        // Inicialización de Swiper 
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.mySwiper', {
                slidesPerView: 3,
                spaceBetween: 50,
                centeredSlides: true,
                loop: true,
                grabCursor: true,
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    992: {
                        slidesPerView: 3,
                    }
                }
            });
        });
    </script>

 @endsection