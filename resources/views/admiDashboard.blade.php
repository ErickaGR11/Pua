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
        <p class="text-muted">Here's what's happening with your store today</p>
        

        <div class="row g-3 mb-4">
            <div class="col-md-6">
            <div class="p-3 bg-light rounded shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                <div>
                    <i class="bi bi-box fs-3 text-primary"></i>
                </div>
                <div class="text-end">
                    <h5 class="mb-0">250</h5>
                    <small class="text-success">+2.5%</small>
                    <p class="mb-0 text-muted">Total productos vendidos</p>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="p-3 bg-light rounded shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                <div>
                    <i class="bi bi-bag-check fs-3 text-success"></i>
                </div>
                <div class="text-end">
                    <h5 class="mb-0">124</h5>
                    <small class="text-success">+2.5%</small>
                    <p class="mb-0 text-muted">Ordenes completadas</p>
                </div>
                </div>
            </div>
            </div>
            <!--<div class="col-md-4">
            <div class="p-3 bg-light rounded shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                <div>
                    <i class="bi bi-x-circle fs-3 text-danger"></i>
                </div>
                <div class="text-end">
                    <h5 class="mb-0">14</h5>
                    <p class="mb-0 text-muted">Cancelled orders</p>
                </div>
                </div>
            </div>
            </div> -->
        </div>

        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <h5 class="fw-bold fs-3" style="color: rgb(27, 87, 189)">Ventas</h5>
            <p class="text-muted">Visualiza información sobre tus ventas</p>
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

            <!-- Aquí iría el gráfico -->
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
    

 @endsection