<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Pedido</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 40px;
            color: #222;
            background-color: #fff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
        }

        .logo img {
            max-height: 60px;
        }

        .company-info {
            font-size: 0.9rem;
            text-align: right;
        }

        h1 {
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        h2 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #444;
            border-bottom: 1px solid #ddd;
            padding-bottom: 4px;
        }

        h4 {
            font-weight: normal;
            margin-bottom: 10px;
            color: #333;
        }

        .date {
            text-align: right;
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px 12px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .total {
            width: 200px;
            float: right;
            margin-top: 10px;
        }

        .total td {
            font-weight: bold;
            background-color: #fafafa;
        }

        .bank-info, .instructions {
            font-size: 0.95rem;
            margin-top: 25px;
        }

        .bank-info p, .instructions p {
            margin: 6px 0;
        }

        .section {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="Imagenes/logo/logo2.png" alt="Logo de la Empresa">
        </div>
        <div class="company-info">
            <strong>PUA</strong><br>
            Av. Pedro Coronel 51, Guadalupe, Zac.<br>
            Tel: 481-153-56-57<br>
            Email: erickagr119@gmail.com
        </div>
    </div>

    <div class="date">
        Fecha: {{ now()->format('d/m/Y') }}
    </div>

    <h1>Resumen de Pedido</h1>

    <div class="section">
        <h2>Cliente</h2>
        <h4>{{ $user->name }}</h4>
    </div>

    <div class="section">
        <h2>Productos</h2>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Aroma</th>
                    <th>Color</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->aroma }}</td>
                        <td>{{ $producto->color }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>${{ number_format($producto->subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <table class="total">
        <tr>
            <td>Total: ${{ number_format($total, 2) }}</td>
        </tr>
    </table>

    <div class="bank-info">
        <h2>Datos para Pago</h2>
        <p><strong>Cuenta:</strong> 1234567890123456</p>
        <p><strong>Banco:</strong> Bancomer</p>
    </div>

    <div class="instructions">
        <h2>Instrucciones</h2>
        <p>Se te contactará vía WhatsApp o correo para coordinar la entrega.</p>
        <p>Se requiere un anticipo mínimo del 50% para comenzar el proceso del pedido.</p>
        <p>Envía el comprobante de pago para confirmar tu pedido.</p>
    </div>
</body>
</html>
