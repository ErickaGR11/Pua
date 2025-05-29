<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
         @if(Auth::check() && Auth::user()->role === 'admin')
            <a class="navbar-brand" href="{{ route('admiDashboard') }}" wire:navigate>
                <img src="../Imagenes/logo/logo2.png" alt="" width="100px" height="50px">
            </a>
        @else
            <a class="navbar-brand" href="{{ route('dashboard') }}" wire:navigate>
                <img src="../Imagenes/logo/logo2.png" alt="" width="100px" height="50px">
            </a>
        @endif

        <button class="navbar-toggler border-0 bg-transparent shadow-none p-2" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class="bi bi-list fs-3 text-dark-gray"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-center justify-content-md-between" id="navbarSupportedContent">
         

            <!-- Center Side Of Navbar -->
            <ul class="navbar-nav mx-auto text-center flex-column flex-md-row align-items-center gap-2">
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link fs-5 text-dark-gray hover-effect" href="{{ route('admiDashboard') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 text-dark-gray hover-effect" href="{{ route('admiCrudProductos') }}">Productos</a>
                    </li>
                  <!--  <li class="nav-item">
                        <a class="nav-link fs-5 text-dark-gray hover-effect" href="">Ordenes de compra</a>
                    </li> -->
                @else
                  <!--   <li class="nav-item">
                        <a class="nav-link fs-5 text-dark-gray hover-effect" href="#">Categorías</a>
                    </li>
                   <li class="nav-item">
                        <a class="nav-link fs-5 text-dark-gray hover-effect" href="#">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 text-dark-gray hover-effect" href="#">Contacto</a>
                    </li> -->
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-md-auto text-center flex-column flex-md-row align-items-center gap-2">
                 @if(Auth::check() && Auth::user()->role !== 'admin')
                    <li class="nav-item">
                        <!-- Visible solo en pantallas grandes -->
                        <a href="{{ route('carrito') }}" class="nav-link d-none d-md-flex align-items-center text-dark-gray hover-effect" href="#">
                            <i class="bi bi-cart-fill fs-4"></i>
                        </a>
                        <!-- Visible solo en pantallas pequeñas -->
                        <a href="{{ route('carrito') }}" class="nav-link d-flex d-md-none align-items-center gap-1 text-dark-gray hover-effect" href="#">
                            <i class="bi bi-cart-fill fs-4"></i>
                            <span>Carrito</span>
                        </a>
                    </li>
                @endif
               @if(Auth::check())
                    <li class="nav-item dropdown fs-5 fw-semibold">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-dark-gray hover-effect" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-fill fs-4"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end fs-5">
                            <a class="dropdown-item text-dark-gray hover-effect" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item text-dark-gray hover-effect" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Log Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </div>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

<!-- Estilos personalizados -->
<style>
    .text-dark-gray {
        color: #343a40 !important;
    }

    .hover-effect:hover {
        color: #212529 !important; 
        background-color: #f8f9fa; 
        border-radius: 10px;
        transition: 0.2s ease-in-out;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #f0f0f0;
        color: #212529 !important;
    }
</style>
