@extends('layouts.app')

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
    
    <!-- Estilos personalizados para Swiper -->
    <style>
    .swiper {
            width: 100%;
            padding-top: 10px;
            padding-bottom: 40px;
        }

        .swiper-slide {
            transition: transform 0.3s ease;
        }

        .swiper-slide-active .custom-card {
            transform: scale(1.1);
            z-index: 10;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.307);
        }
        .swiper-slide-active .custom-card .card-body2 {
            background-color: rgba(0, 0, 0, 0.183);
            color: #ffffff;
            border-radius: 20px 20px 0px 0px;
            display: block;
        }
        .card-body2 {
           display: none;
        }

        .custom-card {
            transition: transform 0.3s ease;
        }

        .card-img {
            object-fit: cover;
            height: 550px;
            opacity: 0.85;
        }

        @media (max-width: 576px) {
           .card-img {
                height: 300px;
            }

            .swiper-slide-active .custom-card {
                transform: scale(1.02);
            }

            .card-body2 h4,
            .card-body2 h5 {
                font-size: 1rem;
            }

            .btn {
                padding: 0.25rem 0.5rem;
                font-size: 0.875rem;
            }
        }
        .nav-link{
            color: black !important; 
        }
   
        
        .card-hover3 {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            color: white;
            min-height: 200px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            height: 400px;
        }

        .card-hover3.active {
            transform: scale(1.05);
            z-index: 10;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
        }


        .card-icon3,
        .card-expand3 {
            position: absolute;
            padding: 0.5rem;
            border-radius: 0.5rem;
        }


        .card-expand3 {
            top: 1rem;
            right: 1rem;
            background-color: rgba(0, 0, 0, 0.1);
        }

        .card-body3 {
            opacity: 0;
            transition: opacity 0.3s ease;
           
        }

        .card-hover3.active .card-body3 {
        opacity: 1;
        }

        .card-content3 {
        padding: 2rem 1rem;
        }

    #productTabsContent .card img{
        height: 400px; 
        object-fit: cover;
    } 

    
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


    @media (max-width: 768px) {
        #productos h2 {
            font-size: 1.75rem;
        }

        #productos p,
        #productos .card-text {
            font-size: 0.95rem;
        }

        #productos .btn {
            font-size: 0.875rem;
            padding: 0.4rem 0.6rem;
        }

        #productos .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        #productTabsContent .card img{
            height: 200px; 
            object-fit: cover;
        } 
    }
    
    </style>
<!-- PRODUCTOS-->
    <!-- Secciones:
        - NuevosDiseños 1
        - Populares 2
        
        Categorias:
        - Flores 2
        - Natural 1
        - Creativos 3
        
        Seccion/Categorias
    -->
<!-- Nuevos diseños/ Combinacion de categorias-->
    <section id="Nuevos" class="px-3 px-md-5">
        <div class="text-center">
            <div class="row">
                <div class="col-md-12 d-flex flex-column justify-content-center">
                    <div class="p-4">
                        <h1 class="display-3 fw-bold">Nuevas ideas,<span style="color: #bd1553;"> nuevas </span> velas</h1>

                        <p class="lead"> Explora la versatilidad en su máxima expresión. <br> Nuestros nuevos diseños combinan lo mejor de diferentes mundos para ofrecerte velas únicas y llenas de personalidad.</p>
                        <span class="d-inline-flex px-2 mt-4 fw-semibold rounded-2" style="font-size: 1.25rem; background-color: #0d674835; color: #08402c; border-color: #08402c; border-width: 1px; border-style: solid;">
                             Innovación
                        </span>
                        <!-- Swiper Carousel -->
                    <div class="swiper mySwiper mt-5">
                        <div class="swiper-wrapper">
                             @foreach ($productosSeccion1 as $producto)
                                <div class="swiper-slide">
                                    <div class="card text-dark custom-card position-relative overflow-hidden">
                                        <!-- Imagen del producto -->
                                        <img src="{{ asset($producto->url_imagen) }}" 
                                            class="card-img"
                                            alt="{{ $producto->nombre }}">

                                        <!-- Contenido inferior fijo -->
                                        <div class="card-body2 position-absolute bottom-0 w-100 p-3 shadow">
                                            <div class="d-flex align-items-center">
                                               <div class="align-items-start">
                                                    <h4 class="card-title mb-1 fw-bold">{{ $producto->nombre }}</h4>
                                                    <h5 class="card-title mb-1">${{ number_format($producto->precio, 2) }}</h5>
                                                </div>
                                                <div class="justify-content-end ms-auto">
                                                    <a href="{{ route('detalleProducto', ['id' => $producto->id]) }}" class="btn m-1 btn-outline1">Personalizar</a>
                                                    <!--<button class="btn btn-outline text-white" style="border-color: #ffffff;">
                                                        <i class="bi bi-cart-plus"></i>
                                                    </button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
<!-- Populares/ Combinacion de categorias-->
    <section id="productos" class="py-5" style="background-color: #efede675">
        <div class="container mb-5 text-center">
        <h2 class="display-5 fw-bold">Favoritos del mes</h2>
        <p class="text-muted mx-auto mb-4" style="max-width: 600px;">
            Echa un vistazo a nuestros productos más vendidos y recomendados por nuestros clientes.
        </p>
        <span class="d-inline-flex px-2 fw-semibold rounded-2 mb-4" style="font-size: 1.25rem; background-color: #d4b6e696; color: #4e2267; border-color: #4e2267; border-width: 1px; border-style: solid;">
            Populares
        </span>
    
        <!-- Carrusel con botones -->
        <div class="position-relative" style="overflow: hidden;">
        <!-- Carrusel -->
        <div id="carouselTrack" class="d-flex mySwiper transition" style="gap: 1rem; transition: transform 0.5s ease;">
            <!-- Tarjetas de producto -->
            @foreach ($productosSeccion2 as $producto)
            <div class="card flex-shrink-0">
                <img src="{{ asset($producto->url_imagen) }}" class="card-img-top" style="height: 330px; object-fit: cover;" alt="{{ $producto->nombre }}">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-start">
                        <h5 class="card-title fs-4 fw-bold">{{ $producto->nombre }}</h5>
                        <p class="card-text fs-5">${{ number_format($producto->precio, 2) }}</p>
                        <p class="card-text"><small class="text-muted">{{ $producto->descripcion }}</small></p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mt-3">
                        <a href="{{ route('detalleProducto', ['id' => $producto->id]) }}" class="btn m-1 btn-outline2">Personalizar</a>
                        <!--<button class="btn btn-outline2 text-white">
                            <i class="bi bi-cart-plus"></i>
                        </button> -->
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
  
<!-- Romanticos/ Flores (2) - Natural(1)-->
    <section id="productos" class="py-3" >
        <div class="container my-5 text-center ">
            <h2 class="display-5 fw-bold"> Enciende el amor </h2>
            <p class="text-muted mx-auto mb-4" style="max-width: 600px;">
                El detalle perfecto para expresar amor y ternura. Explora nuestra selección de velas cuidadosamente elaboradas para inspirar momentos inolvidables.
            </p>
            <span class="d-inline-flex px-2 fw-semibold rounded-2 mb-4" style="font-size: 1.25rem; background-color: #f1cdd7; color: #af134f; border-color: #af134f; border-width: 1px; border-style: solid;">
                Romance
            </span>
            <div class="card border-0 text-start">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs " id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('dashboard') }}" class="nav-link active" id="tab-uno" data-bs-toggle="tab" data-bs-target="#contenido-uno" type="button" role="tab" aria-controls="contenido-uno" aria-selected="true">
                                Flores 
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('dashboard')}}" class="nav-link" id="tab-dos" data-bs-toggle="tab" data-bs-target="#contenido-dos" type="button" role="tab" aria-controls="contenido-dos" aria-selected="false">
                                Natural
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="card-body tab-content" id="productTabsContent"> 
                    <div class="tab-pane fade show active" id="contenido-uno" role="tabpanel" aria-labelledby="tab-uno">
                        <div class="row row-cols-2 row-cols-md-3 g-4">
                            @forelse($productosCategoria2 as $producto)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset($producto->url_imagen) }}" class="card-img-top" alt="Imagen de {{ $producto->nombre }}">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-start">
                                            <h5 class="card-title fs-4 fw-bold">{{ $producto->nombre }}</h5>
                                            <h3 class="card-title fs-4 fw-bold">$ {{ number_format($producto->precio, 2) }}</h3>
                                            <p class="card-text"><small class="text-muted">{{ $producto->descripcion }}</small></p>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-3">
                                            <a href="{{ route('detalleProducto', ['id' => $producto->id]) }}" class="btn m-1 btn-outline2">Personalizar</a>
                                            <!--<button class="btn btn-outline2 text-white">
                                                <i class="bi bi-cart-plus"></i>
                                            </button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No hay productos disponibles para esta categoría.</p>
                        @endforelse
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="contenido-dos" role="tabpanel" aria-labelledby="tab-dos">
                    <div class="row row-cols-2 row-cols-md-3 g-4">
                        @forelse($productosCategoria1 as $producto)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset($producto->url_imagen) }}" class="card-img-top" alt="Imagen de {{ $producto->nombre }}">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-start">
                                            <h5 class="card-title fs-4 fw-bold">$ {{ number_format($producto->precio, 2) }}</h5>
                                            <p class="card-text"><small class="text-muted">{{ $producto->descripcion }}</small></p>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-3">
                                            <a href="{{ route('detalleProducto', ['id' => $producto->id]) }}" class="btn m-1 btn-outline2">Personalizar</a>
                                            <!--<button class="btn btn-outline2 text-white">
                                                <i class="bi bi-cart-plus"></i>
                                            </button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No hay productos disponibles para esta categoría.</p>
                        @endforelse
                    </div>
                </div>   
            </div>
        </div>
        </div>
    </section>


<!-- Diversion/ Creativos-->
    <section id="productos" class="my-5 py-5" style="background-color: #efede675;">
        <div class="container my-5 text-center">
        <h2 class="display-5 fw-bold">Hechas para sorprender</h2>
        <p class="text-muted mx-auto mb-4" style="max-width: 600px;">
            Explora una colección de velas que desafían lo convencional. Diseños originales y sorprendentes que iluminan tus espacios con un toque de arte.
        </p>
        <span class="d-inline-flex px-2 fw-semibold rounded-2 mb-4" style="font-size: 1.25rem; background-color: #0d674835; color: #08402c; border-color: #08402c; border-width: 1px; border-style: solid;">
            Diversión
        </span>
       
       <div class="row g-4 mx-4">
        @foreach ($productosCategoria3 as $producto)
            <div class="col-md-4 ">
                <div class="card-hover3 p-4" style="background-image: url('{{ asset($producto->url_imagen) }}'); background-size: cover; background-position: center;">
                    <div class="card-expand3">
                        <i class="bi bi-arrows-angle-expand"></i>
                    </div>
                
                    <div class="card-body3">
                        <!-- Nombre del producto alineado a la izquierda -->
                        <h5 class="fw-bold fs-2 text-start" style=" text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.513);">{{ $producto->nombre }}</h5>

                        <!-- Descripción también alineada a la izquierda -->
                        <p class="mb-2 fs-4 text-start" style=" text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.347);">{{ $producto->descripcion }}</p>

                        <!-- Precio a la izquierda, botones a la derecha -->
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fw-bold fs-4 mb-0 text-start" style=" text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.347);">${{ number_format($producto->precio, 2) }}</p>

                            <div class="d-flex gap-2">
                                <a href="{{ route('detalleProducto', ['id' => $producto->id]) }}" class="btn btn-outline3">Personalizar</a>
                                <!--<button class="btn btn-outline3 text-white ">
                                    <i class="bi bi-cart-plus"></i>
                                </button> -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        @endforeach
        </div>
    </section>
 

<!-- footer-->
    <footer id="Contacto" class="border-top py-5">
      <div class="container px-4">
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
          
          <!-- Tienda -->
          <div class="col">
            <h5 class="text-uppercase small mb-3">Tienda</h5>
            <ul class="list-unstyled">
              <li><a href="#" class="text-muted text-decoration-none d-block mb-2">Dirección: Calle Ejemplo 123, Ciudad, Estado, CP 12345</a></li>
              <li><a href="#" class="text-muted text-decoration-none d-block mb-2">Personalización</a></li>
              <li><a href="#" class="text-muted text-decoration-none d-block mb-2">Colección Esencial</a></li>
            </ul>
          </div>
    
          <!-- Información -->
          <div class="col">
            <h5 class="text-uppercase small mb-3">Información</h5>
            <ul class="list-unstyled">
              <li><a href="#SobreNosotros" class="text-muted text-decoration-none d-block mb-2">Sobre nosotros</a></li>
            </ul>
          </div>
            <!-- Redes -->
            <div class="col">
              <h5 class="text-uppercase small mb-3">Redes Sociales</h5>
                  <div class="d-flex gap-3">
                  <a href="https://www.instagram.com/tu_usuario" target="_blank" class="text-muted text-decoration-none">
                      <i class="bi bi-instagram"></i> Velas.pua
                  </a>
                  <br>
                  <a href="https://www.facebook.com/tu_pagina" target="_blank" class="text-muted text-decoration-none">
                      <i class="bi bi-tiktok"></i> Velas.pua
                  </a>
                
                  </div>
            </div>
    
          <!-- Contacto -->
          <div class="col">
              <h5 class="text-uppercase small mb-3">Contacto</h5>
              <p class="text-muted small mb-3">
                  <i class="bi bi-email"> info@pua-velas.com<br>
                  <i class="bi bi-whatsaap"></i> +52 55 1234 5678<br>
              </p>
          </div>
        </div>
    
        <div class="mt-5 pt-4 border-top d-flex flex-column flex-md-row justify-content-between align-items-center">
          <p class="text-muted small mb-3 mb-md-0">&copy; 2025 PUA. Todos los derechos reservados.</p>
          <div class="d-flex gap-4 justify-content-center">
            <a href="#" class="text-muted small text-decoration-none">Términos y condiciones</a>
            <a href="#" class="text-muted small text-decoration-none">Política de privacidad</a>
          </div>
        </div>
      </div>
    </footer>




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

            //Card Hover
       
            const cards = document.querySelectorAll('.card-hover3');

            cards.forEach(function(card) {
                card.addEventListener('click', function () {
                    // Si la tarjeta ya estaba activa, la cerramos
                    if (card.classList.contains('active')) {
                        card.classList.remove('active');
                    } else {
                        // Cerramos todas las demás
                        cards.forEach(function(c) {
                            c.classList.remove('active');
                        });
                        // Activamos la clickeada
                        card.classList.add('active');
                    }
                });
            });

            // Carrusel con botones
            const track = document.getElementById("carouselTrack");

            // Aplicar comportamiento scroll suave con snap
            track.style.overflowX = "auto";
            track.style.scrollSnapType = "x mandatory";
            track.style.scrollBehavior = "smooth";
        });
  
       

    </script>

@endsection
