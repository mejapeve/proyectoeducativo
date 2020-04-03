
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/procesar-pago" method="POST">
        <script
        src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js"
        data-preference-id="<?php echo $preference->id; ?>">
        </script>
        @csrf
    </form>
</div>
@endsection
