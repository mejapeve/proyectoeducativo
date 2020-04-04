@extends('layouts.app')

@section('content')
    <form action="/procesar-pago" method="POST">
       
    </form>
@endsection
@section('js')
        <script
            src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js"
            data-preference-id={{$preference->id}}
        >
        </script>
@endsection