<x-layouts.app :title="__('Dashboard')">
    <x-slot name="header">
        <x-app-logo />
    </x-slot>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Estilos personalizados para Swiper -->
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
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.259);
        }

        .custom-card {
            transition: transform 0.3s ease;
        }

        .card-img {
            object-fit: cover;
            height: 300px;
            opacity: 0.85;
        }

        .card-img-overlay {
            background-color: rgba(0, 0, 0, 0.138);
            color: #ffffff;
        }
    </style>
<!-- PRODUCTOS-->

  <!-- Nuevos diseños-->
    <section id="Nuevos" class="mx-5">
        <div class="text-center">
            <div class="row">
                <div class="col-md-12 d-flex flex-column justify-content-center" style="min-height: 90vh;">
                    <div class="p-4">
                        <h1 class="display-3 fw-bold">Nuevas ideas,<span style="color: #bd1553;"> nuevas </span> velas</h1>

                        <p class="lead"> Explora la versatilidad en su máxima expresión. <br> Nuestros nuevos diseños combinan lo mejor de diferentes mundos para ofrecerte velas únicas y llenas de personalidad.</p>
                        <span class="d-inline-flex px-2 mt-4 fw-semibold rounded-2" style="font-size: 1.25rem; background-color: #0d674835; color: #08402c; border-color: #08402c; border-width: 1px; border-style: solid;">
                             Innovación
                        </span>
                        <!-- Swiper Carousel -->
                        <div class="swiper mySwiper mt-5">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="card text-dark custom-card">
                                        <img src="Imagenes/Productos/NuevosDiseños/img1.jpg" style="height:450px;" class="card-img" alt="Vela 1">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title">Vela Aromática 1</h5>
                                            <p class="card-text">Perfecta para cenas románticas.</p>
                                            <p class="card-text"><small>Última actualización: hoy</small></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="card text-dark custom-card">
                                        <img src="Imagenes/Productos/NuevosDiseños/img2.jpg" style="height:450px;" class="card-img" alt="Vela 2">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title">Vela Floral 2</h5>
                                            <p class="card-text">Llena tu ambiente de calma y armonía.</p>
                                            <p class="card-text"><small>Última actualización: hoy</small></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="card text-dark custom-card">
                                        <img src="Imagenes/Productos/NuevosDiseños/img3.jpg" style="height:450px;" class="card-img" alt="Vela 3">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title">Vela Tropical 3</h5>
                                            <p class="card-text">Siente la frescura del verano en tu hogar.</p>
                                            <p class="card-text"><small>Última actualización: hoy</small></p>
                                        </div>
                                    </div>
                                </div>
                                 <div class="swiper-slide">
                                    <div class="card text-dark custom-card">
                                        <img src="Imagenes/Productos/NuevosDiseños/img4.jpg" style="height:450px;" class="card-img" alt="Vela 3">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title">Vela Tropical 3</h5>
                                            <p class="card-text">Siente la frescura del verano en tu hogar.</p>
                                            <p class="card-text"><small>Última actualización: hoy</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Swiper -->
                    </div>
                </div>
            </div>
        </div>
    </section>
  
     <!-- Populares-->
        <section id="productos" class="me-5 py-5" style="background-color: #efede675">
            <div class="container mb-5 text-center">
            <h2 class="display-5 fw-bold">Favoritos del mes</h2>
            <p class="text-muted mx-auto mb-4" style="max-width: 600px;">
                Echa un vistazo a nuestros productos más vendidos y recomendados por nuestros clientes.
            </p>
            <span class="d-inline-flex px-2 fw-semibold rounded-2 mb-4" style="font-size: 1.25rem; background-color: #d4b6e696; color: #4e2267; border-color: #4e2267; border-width: 1px; border-style: solid;">
                Populares
            </span>
        
            <!-- Carrusel con botones a los costados -->
            <div class="position-relative" style="overflow: hidden;">
              <!-- Botón Izquierdo -->
                <button id="prevBtn" class="btn position-absolute top-50 start-0 translate-middle-y z-1 
                bg-white text-dark shadow-lg border-0 ms-2">
                <i class="bi bi-arrow-left fs-5"></i>
                </button>

                <!-- Botón Derecho -->
                <button id="nextBtn" class="btn position-absolute top-50 end-0 translate-middle-y z-1 
                bg-white text-dark shadow-lg border-0 me-2">
                <i class="bi bi-arrow-right fs-5"></i>
                </button>

        
            <!-- Carrusel -->
            <div id="carouselTrack" class="me-5 d-flex transition" style="gap: 1rem; transition: transform 0.5s ease;">
                <!-- Tarjetas de producto -->
                @for ($i = 1; $i <= 7; $i++)
                    <div class="card flex-shrink-0" style="width: 350px; height: 100%; min-height: 100%;">
                        <img src="{{ asset('Imagenes/Productos/Populares/img' . $i . '.jpg') }}" class="card-img-top" style="height: 330px; object-fit: cover;" alt="Vela {{ $i }}">
                        <div class="card-body">
                            <h5 class="card-title">Vela {{ $i }}</h5>
                            <p class="card-text">Descripción breve de la vela {{ $i }}.</p>
                            <p class="card-text"><small class="text-muted">Última actualización: hoy</small></p>
                            <a href="#" class="btn" style="background-color: #08402c; color:white;">Personalizar</a> 
                        </div>
                    </div>
                @endfor
            </div>
        </section>
  
        <!-- Romanticos-->
        <section id="productos" class="py-3" >
            <div class="container my-5 text-center ">
                <h2 class="display-5 fw-bold"> Enciende el amor </h2>
                <p class="text-muted mx-auto mb-4" style="max-width: 600px;">
                    El detalle perfecto para expresar amor y ternura. Explora nuestra selección de velas cuidadosamente elaboradas para inspirar momentos inolvidables.
                </p>
                <span class="d-inline-flex px-2 fw-semibold rounded-2 mb-4" style="font-size: 1.25rem; background-color: #f1cdd7; color: #af134f; border-color: #af134f; border-width: 1px; border-style: solid;">
                    Romance
                </span>

                <div class="card text-start">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="tab-uno" data-bs-toggle="tab" data-bs-target="#contenido-uno" type="button" role="tab" aria-controls="contenido-uno" aria-selected="true">
                                    Flores 
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-dos" data-bs-toggle="tab" data-bs-target="#contenido-dos" type="button" role="tab" aria-controls="contenido-dos" aria-selected="false">
                                    Natural
                                </button>
                            </li>
                            
                        </ul>
                    </div>

                    <div class="card-body tab-content" id="productTabsContent">
                        <div class="tab-pane fade show active" id="contenido-uno" role="tabpanel" aria-labelledby="tab-uno">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="col">
                                        <div class="card h-100">
                                            <img src="{{ asset('Imagenes/Productos/Flores/img' . $i . '.jpg') }}" class="card-img-top" style="height: 500px; object-fit: cover;" alt="Velas Florales {{ $i }}">
                                            <div class="card-body">
                                                <h5 class="card-title">Precio {{ $i }}</h5>
                                                <p class="card-text">BTN personalizar {{ $i }}. Puedes personalizarlo según tus necesidades.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                                
                        </div>
                        
                        <div class="tab-pane fade" id="contenido-dos" role="tabpanel" aria-labelledby="tab-dos">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @for ($i = 1; $i <= 12; $i++)
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="{{ asset('Imagenes/Productos/Nature/img' . $i . '.jpg') }}" class="card-img-top" style="height: 500px; object-fit: cover;" alt="Velas Nature {{ $i }}">
                                        <div class="card-body">
                                            <h5 class="card-title">Precio {{ $i }}</h5>
                                            <p class="card-text">BTN personalizar {{ $i }}. Puedes personalizarlo según tus necesidades.</p>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>   
                </div>
            </div>
            </div>
        </section>


 <!-- Creativos-->
        <section id="productos" class="my-5 py-5" style="background-color: #efede675;">
            <div class="container my-5 text-center">
            <h2 class="display-5 fw-bold">Hechas para sorprender</h2>
            <p class="text-muted mx-auto mb-4" style="max-width: 600px;">
                Explora una colección de velas que desafían lo convencional. Diseños originales y sorprendentes que iluminan tus espacios con un toque de arte.
            </p>
            <span class="d-inline-flex px-2 fw-semibold rounded-2 mb-4" style="font-size: 1.25rem; background-color: #0d674835; color: #08402c; border-color: #08402c; border-width: 1px; border-style: solid;">
                Creativos
            </span>
           
           <div class="row">
                <div class="col-md-6 p-4" style="background-image: url('Imagenes/Productos/Creativos/img1.jpg'); background-size: cover; background-position: center;">
                    <div class="card-body">
                        <h5 class="card-title">Vela Creativa 1</h5>
                        <p class="card-text">Precio</p>
                        <a href="#" class="btn" style="background-color: #08402c39; color:white;">Personalizar</a>
                    </div>
                </div>
                <div class="col-md-6" style="background-color: #efede675;">
                   <div class="row">
                        <div class="col-md-6 p-4" style="height:250px; background-image: url('Imagenes/Productos/Creativos/img2.jpg'); background-size: cover; background-position: center;">
                            <div class="card-body">
                                <h5 class="card-title">Vela Creativa 2</h5>
                                <p class="card-text">Precio</p>
                                <a href="#" class="btn" style="background-color: #08402c39; color:white;">Personalizar</a>
                            </div>
                        </div>
                        <div class="col-md-6 p-4"  style="height:250px; background-image: url('Imagenes/Productos/Creativos/img3.jpg'); background-size: cover; background-position: center;">
                            <div class="card-body">
                                <h5 class="card-title">Vela Creativa 3</h5>
                                <p class="card-text">Precio</p>
                                <a href="#" class="btn" style="background-color: #08402c39; color:white;">Personalizar</a>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-6 p-4"  style="height:250px;background-image: url('Imagenes/Productos/Creativos/img4.jpg'); background-size: cover; background-position: center;">
                            <div class="card-body">
                                <h5 class="card-title">Vela Creativa 4</h5>
                                <p class="card-text">Precio</p>
                                <a href="#" class="btn" style="background-color: #08402c39; color:white;">Personalizar</a>
                            </div>
                        </div>
                        <div class="col-md-6 p-4"  style="height:250px;background-image: url('Imagenes/Productos/Creativos/img5.jpg'); background-size: cover; background-position: center;">
                            <div class="card-body">
                                <h5 class="card-title">Vela Creativa 5</h5>
                                <p class="card-text">Precio</p>
                                <a href="#" class="btn" style="background-color: #08402c39; color:white;">Personalizar</a>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-6 p-4"  style="height:250px; background-image: url('Imagenes/Productos/Creativos/img6.jpg'); background-size: cover; background-position: center;">
                            <div class="card-body">
                                <h5 class="card-title">Vela Creativa 6</h5>
                                <p class="card-text">Precio</p>
                                <a href="#" class="btn"style="background-color: #08402c39; color:white;">Personalizar</a>
                            </div>
                        </div>
                        <div class="col-md-6 p-4"  style="height:250px;background-image: url('Imagenes/Productos/Creativos/img7.jpg'); background-size: cover; background-position: center;">
                            <div class="card-body">
                                <h5 class="card-title">Vela Creativa 7</h5>
                                <p class="card-text">Precio</p>
                                <a href="#" class="btn" style="background-color: #08402c39; color:white;">Personalizar</a>
                            </div>
                        </div>
                    </div>   
                </div>
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

    
</x-layouts.app>
<!-- Inicialización de Swiper -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.mySwiper', {
                slidesPerView: 3,
                spaceBetween: 30,
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
  

    const track = document.getElementById("carouselTrack");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
  
    let position = 0;
    const cardWidth = 260; // 250px + gap (aproximadamente)
    const visibleCards = Math.floor(track.parentElement.offsetWidth / cardWidth);
    const totalCards = track.children.length;
    const maxPosition = totalCards - visibleCards;
  
    prevBtn.addEventListener("click", () => {
      position = Math.max(position - 1, 0);
      track.style.transform = `translateX(-${position * cardWidth}px)`;
    });
  
    nextBtn.addEventListener("click", () => {
      position = Math.min(position + 1, maxPosition);
      track.style.transform = `translateX(-${position * cardWidth}px)`;
    });
  
    // Opcional: desactivar botones al llegar a los extremos
    function updateButtonState() {
      prevBtn.disabled = position === 0;
      nextBtn.disabled = position === maxPosition;
    }
  
    // Llama esto cada vez que se mueva
    const updateCarousel = () => {
      track.style.transform = `translateX(-${position * cardWidth}px)`;
      updateButtonState();
    };
  
    prevBtn.addEventListener("click", () => {
      position = Math.max(position - 1, 0);
      updateCarousel();
    });
  
    nextBtn.addEventListener("click", () => {
      position = Math.min(position + 1, maxPosition);
      updateCarousel();
    });
  
    // Inicializa estado
    updateButtonState();
    </script>