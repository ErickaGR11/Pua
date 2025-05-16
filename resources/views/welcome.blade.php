<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Velas Pua</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Iconos -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <style>
            .rect-top2 {
                background-image: url("Imagenes/img13.png");
                background-size: cover; /* O usa 'cover' si quieres que llene todo el espacio */
                background-repeat: no-repeat;
                background-position: center;
                height: 100%;
                filter:drop-shadow(0 10px 25px rgba(0, 0, 0, 0.15)); /* Sombra elegante */
                mask-image: linear-gradient(to top, rgb(255, 255, 255) 10%, rgb(255, 0, 0) 30%);
            }
    
            .rect-top {
            background-color: #d4b6e6;
            height: 300px;
            border-radius: 20px;
            }

            .square {
            background-color: #f1cdd7;
            height: 200px;
            border-radius: 20px;
            }
            .square-right {
            background-color: #bd1553;
            }
            .square2{
            height: 200px;
            border-radius: 20px;
            }
            .square-left2 {
            background-color: #f1cdd7;
            background-image: url("Imagenes/img8.png");
            background-size: cover; /* La imagen cubrirá todo el contenedor */
            background-repeat: no-repeat; /* La imagen no se repetirá */
            background-position: center; /* La imagen se centrará */
            }
            .square-right2 {
            background-color: #bd1553;
            background-image: url("Imagenes/img1.png");
            background-size: cover; /* La imagen cubrirá todo el contenedor */
            background-repeat: no-repeat; /* La imagen no se repetirá */
            background-position: center; /* La imagen se centrará */
            }

            .accordion-button:not(.collapsed) {
                background-color: #f1cdd736; /* Rosa claro */
                color: #bd1553; /* Rosa oscuro */
            }

            .accordion-button {
                color: #212529;
                background-color: #fff;
            }

            .accordion-button:focus {
                box-shadow: 0 0 0 0.1rem rgba(150, 20, 67, 0.34);
                
            }
            
        </style>

    </head>
    <body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <nav class="navbar navbar-expand-lg shadow-sm py-3 bg-white">
            <div class="container">
                <!-- IZQUIERDA: Logo -->
                <a href="#">
                    <img src="Imagenes/logo/logo2.png" alt="" style="width: 110px; height: 50px; margin-left: 10px;">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- CONTENIDO del menú -->
                <div class="collapse navbar-collapse" id="navbarContent" style="font-size: 18px;">
                    <!-- CENTRO: Menú de navegación -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 d-flex gap-3 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#SobreNosotros">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="offeringsDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Productos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="offeringsDropdown">
                                <li><a class="dropdown-item" href="#productos">Populares</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Contacto">Contacto</a>
                    </ul>
        
                    <!-- DERECHA: Botones de usuario -->
                    @if (Route::has('login'))
                        <div class="d-flex gap-2">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-md rounded-pill px-3 mx-2" style="color: #0c442c; border: 1px solid #0c442c;">
                                    Ir a inicio
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-md rounded-pill px-3 mx-2" style="color: #0c442c; border: 1px solid #0c442c;">
                                    Iniciar Sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-md rounded-pill px-3" style="background-color: #0c442c; color: white;">
                                       Registrarse
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
      
        @if (Route::has('login'))
            <div class="hidden lg:block"></div>
        @endif

        <div class="container my-5">
            <div class="row g-0">
                <div class="col-md-5 p-4" style="background-color: #efede675;">
                    <h1 class="display-3 fw-bold" >Velas artesanales que <span style="color: #bd1553;">iluminan</span> tus momentos únicos</h1>
                    <p class="lead">Para una ocasión especial o para disfrutar en casa, nuestras velas son el complemento perfecto para cualquier ambiente.</p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('register') }}" class="btn btn-lg rounded-pill" style="background-color: #0c442c; color:white">Comienza a personalizar <i class="bi bi-arrow-right"></i></a>
                        <button class="btn btn-outline-secondary btn-lg rounded-pill">Contactanos wpp</button> 
                    </div>
                </div>
                <div class="col-md-7 p-5 rounded-end" style="background-color: #efede675;">
                    <div class="rect-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="square"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="square square-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="SobreNosotros" class="mx-4">
            <div class="row g-0">
                <div class="col-md-6">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active" data-bs-interval="2000">
                            <img src="Imagenes/Principal carrusel/img1.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img src="Imagenes/Principal carrusel/img2.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img src="Imagenes/Principal carrusel/img3.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img src="Imagenes/Principal carrusel/img4.png" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img src="Imagenes/Principal carrusel/img5.png" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img src="Imagenes/Principal carrusel/img6.png" class="d-block w-100" alt="...">
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-4 pe-4 ">
                    <h1 class="display-4 fw-bold p-4 " style="text-align: center;">Sobre <span style="color: #bd1553;">nosotros</span></h1>
                     <!-- Filtros -->
                     <div class="d-flex justify-content-center mb-3">
                        <div class="bg-light rounded-pill p-2">
                            <button class="btn btn-outline-dark rounded-pill me-2">Aromas</button>
                            <button class="btn btn-outline-dark rounded-pill me-2">Diseños</button>
                            <button class="btn btn-outline-dark rounded-pill">Colores</button>
                        </div>
                    </div>
                      <!-- Texto Sobre Nosotros -->
                    <div class="justify-content-center p-4">
                    <p class="px-4 fs-4 text-center">
                        <strong>PUA</strong> nace del deseo de transformar una pasión en arte. El nombre evoca lo natural, lo esencial,
                        y lo que conecta profundamente con cada persona.
                    </p>
                    <p class="px-4 fs-4 text-center">
                        Somos un emprendimiento familiar que cree en la magia de crear con las manos, en el valor de lo único,
                        y en el poder que tiene una vela para iluminar tanto espacios como emociones.
                    </p>
                    </div>
                    
                </div>
            </div>
        </div>


        <div class="container mb-4 pt-4  text-center">
            <h2 class="fw-bold display-6">¿Por qué elegirnos?</h2>
            <p class="text-muted">
                En PUA, nos dedicamos a crear velas artesanales únicas que no solo iluminan tu espacio, sino que también cuentan una historia. 
                Cada vela es elaborada con amor y atención al detalle, utilizando ingredientes naturales y fragancias cuidadosamente seleccionadas.
            </p>
           
            <div class="row p-4">
                <div class="col-sm-4">
                    <div class="card">
                      <div class="card-header"><i class="bi bi-brush-fill fs-1"></i></div>
                      <div class="card-body">
                        <h5 class="card-title">Personalización Total</h5>
                        <p class="card-text">Crea velas que reflejen tu estilo único. 
                          Elige colores, formas y acabados para diseñar una pieza exclusiva que complemente tu espacio.</p>   
                      </div>
                    </div>
                  </div>
                  
                <div class="col-sm-4 mb-3 mb-sm-0">
                  <div class="card">
                    <div class="card-header"><i class="bi bi-stars fs-1"></i></div>
                    <div class="card-body">
                      <h5 class="card-title">Diseños Únicos</h5>
                      <p class="card-text">Cada vela es una obra de arte artesanal con diseños creativos 
                        que transforman cualquier ambiente en un espacio sofisticado y acogedor.</p>
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header"><i class="bi bi-flower1 fs-1"></i></div>
                      <div class="card-body">
                        <h5 class="card-title">Aromas Variados</h5>
                        <p class="card-text">Nuestra colección de fragancias cuidadosamente seleccionadas crea experiencias sensoriales únicas, 
                            desde notas florales hasta esencias dulces.</p>
                      </div>
                    </div>
                </div>
              </div>
        </div>

        <!-- SECCIÓN DE PRODUCTOS -->
        <section id="productos">
            <div class="container text-center">
            <h2 class="display-5 fw-bold">Nuestros productos</h2>
            <p class="text-muted mx-auto mb-4" style="max-width: 600px;">
                Descubre nuestra colección de velas artesanales, personalizables y con aromas únicos.
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
                  <div id="carouselTrack" class="d-flex transition" style="gap: 1rem; transition: transform 0.5s ease;">
                <!-- Tarjetas de producto -->
                <div class="card flex-shrink-0" style="width: 250px; height: 100%; min-height: 100%;">
                    <img src="Imagenes/Productos/Populares/img1.jpg" class="card-img-top" alt="Vela popular" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 200px;">
                      <div>
                        <h5 class="card-title">Vela de Lavanda</h5>
                        <p class="card-text text-muted">Aroma suave y duradero</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span class="fw-bold">$250 MXN</span>
                        <a class="btn btn-outline-secondary btn-sm">Categoria</a>
                      </div>
                    </div>
                </div>

                <div class="card flex-shrink-0" style="width: 250px; height: 100%; min-height: 100%;">
                    <img src="Imagenes/Productos/Populares/img2.jpg" class="card-img-top" alt="Vela popular" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 200px;">
                      <div>
                        <h5 class="card-title">Vela de Lavanda</h5>
                        <p class="card-text text-muted">Aroma suave y duradero</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span class="fw-bold">$250 MXN</span>
                        <a class="btn btn-outline-secondary btn-sm">Categoria</a>
                      </div>
                    </div>
                </div>

                <div class="card flex-shrink-0" style="width: 250px; height: 100%; min-height: 100%;">
                    <img src="Imagenes/Productos/Populares/img3.jpg" class="card-img-top" alt="Vela popular" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 200px;">
                      <div>
                        <h5 class="card-title">Vela de Lavanda</h5>
                        <p class="card-text text-muted">Aroma suave y duradero</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span class="fw-bold">$250 MXN</span>
                        <a class="btn btn-outline-secondary btn-sm">Categoria</a>
                      </div>
                    </div>
                </div>

                <div class="card flex-shrink-0" style="width: 250px; height: 100%; min-height: 100%;">
                    <img src="Imagenes/Productos/Populares/img4.jpg" class="card-img-top" alt="Vela popular" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 200px;">
                      <div>
                        <h5 class="card-title">Vela de Lavanda</h5>
                        <p class="card-text text-muted">Aroma suave y duradero</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span class="fw-bold">$250 MXN</span>
                        <a class="btn btn-outline-secondary btn-sm">Categoria</a>
                      </div>
                    </div>
                </div>

                <div class="card flex-shrink-0" style="width: 250px; height: 100%; min-height: 100%;">
                    <img src="Imagenes/Productos/Populares/img5.jpg" class="card-img-top" alt="Vela popular" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 200px;">
                      <div>
                        <h5 class="card-title">Vela de Lavanda</h5>
                        <p class="card-text text-muted">Aroma suave y duradero</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span class="fw-bold">$250 MXN</span>
                        <a class="btn btn-outline-secondary btn-sm">Categoria</a>
                      </div>
                    </div>
                </div>
                 <div class="card flex-shrink-0" style="width: 250px; height: 100%; min-height: 100%;">
                    <img src="Imagenes/Productos/Populares/img6.jpg" class="card-img-top" alt="Vela popular" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 200px;">
                      <div>
                        <h5 class="card-title">Vela de Lavanda</h5>
                        <p class="card-text text-muted">Aroma suave y duradero</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span class="fw-bold">$250 MXN</span>
                        <a class="btn btn-outline-secondary btn-sm">Categoria</a>
                      </div>
                    </div>
                </div>
                 <div class="card flex-shrink-0" style="width: 250px; height: 100%; min-height: 100%;">
                    <img src="Imagenes/Productos/Populares/img7.jpg" class="card-img-top" alt="Vela popular" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 200px;">
                      <div>
                        <h5 class="card-title">Vela de Lavanda</h5>
                        <p class="card-text text-muted">Aroma suave y duradero</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span class="fw-bold">$250 MXN</span>
                        <a class="btn btn-outline-secondary btn-sm">Categoria</a>
                      </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <section class="py-5 px-3" style="background-color: #f8f9fa;">
            <div class="container">
              <div class="card shadow-sm p-4">
                <h2 class="text-center display-6 mb-2 fw-bold">Información de Pedidos</h2>
                  <!-- Política de Pago -->
                  <div class="col-md-6 p-4">
                    <h4 class="fw-semibold mb-3 fs-2">Política de Pago</h4>
                    <ul class="list-unstyled fs-4">
                      <li class="d-flex align-items-start mb-3">
                        <div class="me-2" style="color: #08402c;">
                          <i class="bi bi-credit-card-fill fs-5"></i>
                        </div>
                        <div><strong>Anticipo del 50%</strong> para confirmar tu pedido</div>
                      </li>
                      <li class="d-flex align-items-start mb-3">
                        <div class="me-2" style="color: #08402c;">
                          <i class="bi bi-box-seam fs-5"></i>
                        </div>
                        <div><strong>50% restante</strong> al momento de la entrega</div>
                      </li>
                      <li class="d-flex align-items-start mb-3">
                        <div class="me-2" style="color: #08402c;">
                          <i class="bi bi-wallet-fill fs-5"></i>
                        </div>
                        <div>Aceptamos transferencias, depósitos y efectivo</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </section>
          

        <div class="container">
            <!-- FAQ Section -->
            <section id="faq" class="py-5 px-4">
                <div class="container max-w-3xl">
                <div class="text-center mb-5">
                    <h2 class="fw-bold display-6">Preguntas Frecuentes</h2>
                    <p class="text-muted">
                    Encuentra respuestas a las preguntas más comunes sobre nuestros productos.
                    </p>
                </div>
            
                <div class="accordion" id="faqAccordion">
            
                    <!-- Item 1 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"  style="font-size: 24px;">
                        ¿Cuál es el tiempo de entrega?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion" >
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-start mb-3">
                                  <div class="me-2"style="color: rgb(170, 170, 170);">
                                    <i class="bi bi-clock-fill fs-5"></i>
                                  </div>
                                  <div><strong>1-3 días:</strong> Velas en stock</div>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                  <div class="me-2" style="color: rgb(170, 170, 170);">
                                    <i class="bi bi-clock-fill fs-5"></i>
                                  </div>
                                  <div><strong>3-5 días:</strong> Velas sencillas</div>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                  <div class="me-2" style="color: rgb(170, 170, 170);">
                                    <i class="bi bi-clock-fill fs-5"></i>
                                  </div>
                                  <div><strong>10-15 días:</strong> Pedidos personalizados o grandes</div>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                  <div class="me-2" style="color: rgb(240, 200, 0);">
                                    <i class="bi bi-lightning-fill fs-5"></i>
                                  </div>
                                  <div><strong>Opciones urgentes:</strong> Costo adicional</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
            
                    <!-- Item 2 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" style="font-size: 24px;">
                        ¿Puedo personalizar completamente mi vela?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body" style="font-size: 20px;">
                        ¡Absolutamente! Puedes personalizar la forma, el color, el aroma e incluso añadir decoraciones especiales. Para diseños muy específicos, te recomendamos contactarnos directamente para discutir los detalles.
                        </div>
                    </div>
                    </div>
            
                    <!-- Item 3 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" style="font-size: 24px;">
                        ¿Cuáles son los precios y métodos de pago?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body" style="font-size: 20px;">
                        <p>Los precios varían según el tamaño y la complejidad del diseño, desde $230 MXN para velas estándar hasta $500 MXN para diseños personalizados complejos.</p>
                        <p>Aceptamos transferencias bancarias, depósitos y efectivo contra entrega.</p>
                        <p><strong>Política de pago:</strong> Se solicita un anticipo del 50% del total de la compra para confirmar el pedido. El 50% restante se paga al momento de la entrega.</p>
                        </div>
                    </div>
                    </div>
            
                    <!-- Item 4 -->
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" style="font-size: 24px;">
                        ¿Realizan envíos fuera de Zacatecas y San Luis Potosí?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body" style="font-size: 20px;">
                        Actualmente nuestros envíos están disponibles en Zacatecas y San Luis Potosí. Para otras localidades, por favor contáctanos para verificar la disponibilidad y costos adicionales de envío.
                        </div>
                    </div>
                    </div>
            
                </div>
                </div>
            </section>
  
        </div>

        <footer id="Contacto" class="border-top py-5" style="background-color: #efede675">
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
                    <li><a href="#" class="text-muted text-decoration-none d-block mb-2">Nuestro proceso</a></li>
                    <li><a href="#" class="text-muted text-decoration-none d-block mb-2">Sostenibilidad</a></li>
                    <li><a href="#" class="text-muted text-decoration-none d-block mb-2">Blog</a></li>
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
    </body>
    
</html>

<script>
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

