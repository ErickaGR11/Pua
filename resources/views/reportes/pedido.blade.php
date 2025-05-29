<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Pedido</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
            line-height: 1.6;
            color: #000;
            background-color: #EFEDE6;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #ccc;
        }

        .company-info {
            text-align: left;
        }

        .company-info h2 {
            color: #BD1553;
            margin-bottom: 5px;
        }

        .company-info p {
            margin: 3px 0;
            font-size: 0.9em;
            color: #08402C;
        }

        .logo img {
            max-height: 70px;
        }

        h1 {
            color: #BD1553;
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
        }

        h2 {
            color: #08402C;
            border-bottom: 2px solid #D4B6E6;
            padding-bottom: 8px;
        }

        h4 {
            color: #08402C;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: normal;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #F1CDD7;
            font-weight: bold;
            color: #08402C;
        }

        .total-table {
            width: 30%;
            margin-left: auto;
        }

        .total-table th {
            background-color: #BD1553;
            color: #fff;
        }

        .date {
            text-align: right;
            font-size: 0.9em;
            color: #555;
        }

        .bank-info {
            background-color: #F1CDD7;
            padding: 15px;
            margin: 20px 0;
            border: 2px solid #BD1553;
            color: #08402C;
        }

        .instructions {
            background-color: #D4B6E6;
            padding: 20px;
            border-left: 5px solid #BD1553;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="Imagenes/Temu-Logo.jpg" alt="Logo de la Empresa">
        </div>
        <div class="company-info">
            <h2>PUA</h2>
            <p>Dirección: Av. Pedro Coronel 51, Lomas de Bernardez, 98610 Guadalupe, Zac.</p>
            <p>Teléfono: 481-153-56-57</p>
            <p>Email: erickagr119@gmail.com</p>
        </div>
    </div>

    <div class="date">
        Fecha: {{ now()->format('d/m/Y') }}
    </div>

    <h1>Reporte de Pedido</h1>

    <div class="bank-info">
        <h3>Datos de Depósito/Transferencia</h3>
        <p><strong>Cuenta:</strong> 1234567890123456</p>
        <p><strong>Banco:</strong> Bancomer</p>
    </div>

    <div class="section">
        <h2>Detalles del Pedido</h2>
        <h4>Cliente: {{ $user->name }}</h4>
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

    <div class="section">
        <table class="total-table">
            <thead>
                <tr>
                    <th>Total de la compra</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>${{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="instructions">
        <h2>Instrucciones</h2>
        <p>Se te enviará un mensaje por WhatsApp o correo electrónico con los días estimados que va a demorar tu pedido.</p>
        <p>Una vez que eso esté hecho, se debe dar como mínimo un anticipo del 50% para comenzar el proceso de tu pedido.</p>
        <p>Se debe enviar el comprobante al número de WhatsApp y esperar la confirmación del pago.</p>
    </div>
</body>
</html>