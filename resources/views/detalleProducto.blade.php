@extends('layouts.app')
@section('title', 'Detalle del Producto') 
@section('content')

<!-- Estilos y fuentes -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="https://reprints-oriented-venture-memories.trycloudflare.com/css/styles.css">

<style>
    /* Estilo para el color seleccionado */
    .color-option.selected {
        border: 3px solid #dadada !important; 
        transform: scale(1.1);
       
    }

    /* Estilo para el aroma seleccionado */
    .aroma-option.selected {
        background-color: #000000 !important;
        color: white !important;
        border-color: #000000 !important;
    }

    /* Asegurar que el cursor sea un puntero para los colores */
    .color-option {
        cursor: pointer;
        transition: transform 0.2s ease-in-out, border-color 0.2s ease-in-out;
    }
    .aroma-option {
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    }
</style>
<div class="container pb-5">
    <div class="text-start mb-3">
        <a href="javascript:history.back()" class="text-dark"><i class="bi bi-arrow-left fs-4"></i></a>
    </div>

    <div class="row align-items-center">
        <!-- Imagen del producto -->
        <div class="col-md-7 text-center mb-4 mb-md-0">
            <img src="{{ asset($producto->url_imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid" style="max-height: 800px; width: 100%;">
        </div>

        <!-- Información del producto -->
        <div class="col-md-5 ps-4">
            <div class="text-center text-md-start ps-4">
                <h1 class="fs-1">{{ $producto->nombre }}</h1>
                <p class="text-muted fs-6 fs-md-5">Stock disponible: {{ $producto->stock }}</p>

                <!-- Controles de cantidad -->
                <div class="d-flex justify-content-center justify-content-md-start my-3 align-items-center">
                    <!-- Botón de disminuir -->
                    <button class="btn m-1 btn-outline2" onclick="changeQuantity(-1)">−</button>

                    <!-- Contenedor que muestra el número -->
                    <div id="quantityDisplay"
                        class="btn mx-1 btn-lg"
                        style="width: 70px; text-align: center;">
                        1
                    </div>

                    <!-- Botón de aumentar -->
                    <button class="btn m-1 btn-outline2" onclick="changeQuantity(1)">
                        <i class="bi bi-plus"></i>
                    </button>
                </div>

            </div>

            {{-- Formulario para agregar al carrito --}}
            <form id="addToCartForm" method="POST" action="{{ route('carrito.agregar') }}"> 
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <input type="hidden" name="color_id" id="selectedColorId" value="">
                <input type="hidden" name="aroma_id" id="selectedAromaId" value="">
                <input type="hidden" name="quantity" id="selectedQuantity" value="1">


                <div class="mt-4 ps-4">
                    <h5 class="fs-5 fs-md-4">Colores disponibles</h5>
                    <div class="d-flex flex-wrap gap-2" id="colorOptionsContainer">
                        @foreach($colores as $color)
                            <div title="{{ $color->nombre }}"
                                 class="color-option"
                                 data-color-id="{{ $color->id }}" 
                                 data-color-name="{{ $color->nombre }}"
                                 style="width: 35px; height: 35px; border-radius: 50%; background-color:{{ $color->hexadecimal }}; border: 1px solid #ccc;"
                                 onclick="selectColor(this, '{{ $color->id }}')">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4 ps-4">
                    <h5 class="fs-5 fs-md-4">Aromas disponibles</h5>
                    <div class="d-flex flex-wrap gap-2" id="aromaOptionsContainer">
                        @foreach($aromas as $aroma)
                            <button type="button" class="btn btn-outline-dark fs-6 btn-sm aroma-option"
                                    data-aroma-id="{{ $aroma->id }}" 
                                    data-aroma-name="{{ $aroma->nombre }}"
                                    onclick="selectAroma(this, '{{ $aroma->id }}')"> 
                                {{ $aroma->nombre }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="mt-5 px-2 ps-4">
                    <h5 class="fs-3">Descripción</h5>
                    <p class="text-muted fs-5 fs-md-5">{{ $producto->descripcion }}</p>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-5 ps-4">
                    <button type="submit" class="btn btn-outline4 px-4 py-2">
                        Agregar al carrito
                    </button>
                    <span class="fw-bold fs-4">${{ number_format($producto->precio, 2) }}</span>
                </div>
            </form> 
        </div>
    </div>

   
</div>
<script>
    let quantity = 1;
    let selectedColorElement = null;
    let selectedAromaElement = null;

    const quantityDisplay = document.getElementById('quantityDisplay');
    const selectedQuantityInput = document.getElementById('selectedQuantity');
    const selectedColorIdInput = document.getElementById('selectedColorId');
    const selectedAromaIdInput = document.getElementById('selectedAromaId');

    function changeQuantity(change) {
        quantity += change;
        if (quantity < 1) quantity = 1;
        // Considerar el stock máximo si es necesario:
        // if (quantity > {{ $producto->stock }}) quantity = {{ $producto->stock }};

        quantityDisplay.textContent = quantity;
        selectedQuantityInput.value = quantity; // Actualiza el campo oculto
    }

    function selectColor(element, colorId) {
        // Remover clase 'selected' del elemento previamente seleccionado (si existe)
        if (selectedColorElement) {
            selectedColorElement.classList.remove('selected');
        }

        // Añadir clase 'selected' al nuevo elemento y actualizar la referencia
        element.classList.add('selected');
        selectedColorElement = element;

        // Actualizar el campo oculto con el ID del color
        selectedColorIdInput.value = colorId;
        console.log('Color seleccionado ID:', colorId);
    }

    function selectAroma(element, aromaId) {
        // Remover clase 'selected' del elemento previamente seleccionado (si existe)
        if (selectedAromaElement) {
            selectedAromaElement.classList.remove('selected');
        }

        // Añadir clase 'selected' al nuevo elemento y actualizar la referencia
        element.classList.add('selected');
        selectedAromaElement = element;

        // Actualizar el campo oculto con el ID del aroma
        selectedAromaIdInput.value = aromaId;
        console.log('Aroma seleccionado ID:', aromaId);
    }

    // Opcional: Preseleccionar el primer color y aroma si existen
    document.addEventListener('DOMContentLoaded', function() {
        selectedQuantityInput.value = quantity; // Inicializar cantidad

        const firstColor = document.querySelector('.color-option');
        if (firstColor) {
            selectColor(firstColor, firstColor.dataset.colorId);
        }

        const firstAroma = document.querySelector('.aroma-option');
        if (firstAroma) {
            selectAroma(firstAroma, firstAroma.dataset.aromaId);
        }

        // Validación antes de enviar el formulario (opcional pero recomendado)
        const form = document.getElementById('addToCartForm');
        if (form) {
            form.addEventListener('submit', function(event) {
                if (!selectedColorIdInput.value && document.getElementById('colorOptionsContainer').children.length > 0) {
                    alert('Por favor, selecciona un color.');
                    event.preventDefault(); // Evita el envío del formulario
                    return;
                }
                if (!selectedAromaIdInput.value && document.getElementById('aromaOptionsContainer').children.length > 0) {
                    alert('Por favor, selecciona un aroma.');
                    event.preventDefault(); // Evita el envío del formulario
                    return;
                }
            });
        }
    });

</script>
@endsection
