<x-mail::message>
# ¡Gracias por tu compra, {{ $user->name }}!

Adjunto a este correo encontrarás el **PDF con el resumen de tu pedido**.

En él se detallan los productos, cantidades, total de la compra y los datos bancarios para realizar el pago correspondiente.

## ¿Qué sigue?
- Revisa el archivo adjunto con todos los detalles.
- Realiza el pago vía **transferencia o depósito bancario** según las instrucciones incluidas.
- Envía el comprobante de pago al número de WhatsApp o al correo electrónico para continuar con la preparación de tu pedido.

Si tienes alguna duda, no dudes en contactarnos.

Gracias por confiar en nosotros,<br>
**{{ config('app.name') }}**
</x-mail::message>
