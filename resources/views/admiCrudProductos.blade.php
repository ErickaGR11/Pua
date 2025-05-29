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
        #carouselTrack {
            display: flex;
            flex-wrap: nowrap;
            gap: 1rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 1rem;
            scrollbar-width: none;        
            -ms-overflow-style: none;     
        }

        #carouselTrack::-webkit-scrollbar {
           display: none;              
        }

        #carouselTrack .card {
            scroll-snap-align: start;
            flex-shrink: 0;
            width: 90%;
            max-width: 435px;
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

    <section id="productosMasVendidos">
        <div class="container mb-5 text-center">
        <h2 class="display-5 fw-bold" style="color: #bd1553;">Top 5 </h2>
        <p class="text-muted mx-auto mb-4" style="max-width: 600px;">
           Productos más vendidos hasta ahora
        </p>
        <span class="d-inline-flex px-2 fw-semibold rounded-2 mb-4" style="font-size: 1.25rem; background-color: #d4b6e696; color: #4e2267; border-color: #4e2267; border-width: 1px; border-style: solid;">
            Populares
        </span>
    
        <!-- Carrusel con deslizamiento -->
        <div class="position-relative" style="overflow: hidden;">
        <!-- Carrusel -->
        <div id="carouselTrack" class="d-flex mySwiper transition" style="gap: 1rem; transition: transform 0.5s ease;">
            <!-- Tarjetas de producto -->
            @foreach ($productos as $producto)
            <div class="card flex-shrink-0">
                <img src="{{ asset($producto->url_imagen) }}" class="card-img-top" style="height: 330px; object-fit: cover;" alt="{{ $producto->nombre }}">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-start">
                        <h5 class="card-title fs-5 fw-bold">{{ $producto->nombre }}</h5>
                        <p class="card-text fs-6">${{ number_format($producto->precio, 2) }}</p>
                        <p class="card-text"><b>Vendidos: </b>{{ $producto->total_vendido }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
    <div class="container py-4">
        <h2 class="fw-bold mb-4">Productos</h2>
        <p class="text-muted">Crea nuevos, edita, o elimina productos </p>
        <div class="d-flex justify-content-end mb-3"> 
            <button class="btn btn-primary" style="background-color:rgb(27, 87, 189)">Agregar</button>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <input type="text" id="buscadorVentas" class="form-control w-100" placeholder="Search">
        </div>
        
       <!-- <div class="d-flex gap-3 mb-4">
            <button class="btn btn-outline-dark"> Todos</button>
            <button class="btn btn-outline-dark"> Natural</button>
            <button class="btn btn-outline-dark"> Floral</button>
            <button class="btn btn-outline-dark "> Creativo</button>
            
        </div> -->

        <div class="row g-3 mb-4" id="cardsAcordeon">
            @foreach ($productosAll as $producto)
                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 producto-card">
                    <div class="card h-100 border-0 ">
                        <div data-bs-toggle="collapse" data-bs-target="#formProducto{{ $producto->id }}" aria-expanded="false" style="cursor: pointer;">
                            <img src="{{ asset($producto->url_imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}" style="height: 220px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title mb-0 text-center">{{ $producto->nombre }}</h5>
                            </div>
                        </div>

                        <div class="collapse" id="formProducto{{ $producto->id }}" data-bs-parent="#cardsAcordeon">
                            <div class="card-body pt-0">
                                <hr>
                                <form action="{{ route('productos.actualizar', $producto->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')  
                                    <div class="mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Descripción</label>
                                        <textarea name="descripcion" class="form-control" rows="2">{{ $producto->descripcion }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Precio</label>
                                        <input type="number" name="precio" class="form-control" value="{{ $producto->precio }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Stock</label>
                                        <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Categoría</label>
                                        <select name="categoria_id" class="form-select">
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }} {{-- Assuming 'nombre' is the column with the category name --}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Sección</label>
                                        <select name="seccion_id" class="form-select">
                                            @foreach ($secciones as $seccion)
                                                <option value="{{ $seccion->id }}" {{ $producto->seccion_id == $seccion->id ? 'selected' : '' }}>
                                                    {{ $seccion->nombre }} {{-- Assuming 'nombre' is the column with the section name --}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">URL de imagen</label>
                                        <div class="input-group">
                                            <input type="text" id="imagenURL{{ $producto->id }}" name="url_imagen" class="form-control" placeholder="Selecciona una imagen" value="{{ $producto->url_imagen }}" >
                                            <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('fileInput{{ $producto->id }}').click();">
                                                Buscar
                                            </button>
                                        </div>
                                        <input type="file" id="fileInput{{ $producto->id }}" accept="image/*" style="display: none;" onchange="handleFile(this, 'imagenURL{{ $producto->id }}')">
                                    </div>

                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn btn-danger me-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $producto->id }}').submit();">
                                            <i class="bi bi-trash-fill"></i> Eliminar
                                        </button>
                                        <button type="submit" class="btn btn-primary" style="background-color:rgb(27, 87, 189)">Actualizar</button>
                                    </div>
                                </form>
                                <form id="delete-form-{{ $producto->id }}" action="{{ route('productos.eliminar', $producto->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
 
    </div>   

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Script -->
<script>
    document.getElementById('buscadorVentas').addEventListener('input', function () {
        const filtro = this.value.toLowerCase();
        const productos = document.querySelectorAll('.producto-card');

        productos.forEach(card => {
            const nombre = card.querySelector('.card-title').textContent.toLowerCase();
            if (nombre.includes(filtro)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
       
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
                        slidesPerView: 1.5,
                        spaceBetween: 10
                    },
                    576: {
                        slidesPerView: 1.5,
                        spaceBetween: 20
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 50
                    }
                }

            });
        });

</script>

 @endsection