@extends('layouts.app_side')

@section('content')

<div class="card" ng-controller="shoppingCartController" ng-init="init()">
   <div class="card-header">
      <div class="align-items-center row">
         <div class="col">
            <h5 class="mb-sm-0">Carrito de Compras (@{{cards.length}} Items)</h5>
         </div>
         <div class="text-sm-right col-sm-auto">
            <a class="btn btn-outline-secondary btn-sm" href="/e-commerce/products/list">
               <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" class="svg-inline--fa fa-chevron-left fa-w-10 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                  <path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path>
               </svg>
               Sigue Comprando
            </a>
            <script src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js" data-preference-id={{$preference->id}}></script>
         </div>
      </div>
   </div>
   <div class="p-0 card-body">
      <div class="bg-200 text-900 px-1 fs--1 font-weight-semi-bold no-gutters row">
         <div class="p-2 px-md-3 col-9 col-md-8">Nombre</div>
         <div class="px-3 col-3 col-md-4">
            <div class="row">
               <div class="py-2 d-none d-md-block text-center col-md-8">Cantidad</div>
               <div class="text-right p-2 px-md-3 col-md-4">Precio</div>
            </div>
         </div>
      </div>
      <div class="align-items-center px-1 border-bottom border-200 no-gutters row" ng-repeat="card in cards">
         <div class="py-3 px-2 px-md-3 col-8">
            <div class="align-items-center media">
               <a><img class="rounded mr-3 d-none d-md-block" src=@{{card.image}} alt="" width="120"></a>
               <div class="media-body">
                  <h5 class="fs-0"><a class="text-900">@{{card.name}}</a></h5>
                  <h3 class="fs-0"><a class="text-500">@{{card.description}}</a></h3>
                  <div class="fs--2 fs-md--1 text-danger cursor-pointer">Remove</div>
               </div>
            </div>
         </div>
         <div class="p-3 col-4">
            <div class="align-items-center row">
               <div class="d-flex justify-content-end justify-content-md-center px-2 px-md-3 order-1 order-md-0 col-md-8">
                  <div>
                     <div class="input-group input-group-sm" ng-if="card.cant>0">
                        <div class="input-group-prepend"><button type="button" class="border-300 px-2 btn btn-outline-secondary btn-sm">-</button></div>
                        <input min="0" type="number" class="text-center px-2 input-spin-none form-control" value=@{{card.cant}} style="max-width: 40px;">
                        <div class="input-group-append"><button type="button" class="border-300 px-2 btn btn-outline-secondary btn-sm">+</button></div>
                     </div>
                  </div>
               </div>
               <div class="text-right pl-0 pr-2 pr-md-3 order-0 order-md-1 mb-2 mb-md-0 text-600 col-md-4">@{{card.price}}</div>
            </div>
         </div>
      </div>
      <div class="font-weight-bold px-1 no-gutters row">
         <div class="py-2 px-md-3 text-right text-900 col-9 col-md-8">Total</div>
         <div class="px-3 col">
            <div class="row">
               <div class="py-2 d-none d-md-block text-center col-md-8">@{{cards.length}} (items)</div>
               <div class="col-12 col-md-4 text-right py-2 pr-md-3 pl-0 col">@{{totalPrices}}</div>
            </div>
         </div>
      </div>
   </div>
   <div class="d-flex justify-content-end bg-light card-footer">
      <form class="mr-3">
         <div class="input-group input-group-sm">
            <input placeholder="GET50" type="text" class="form-control" value="">
            <div class="input-group-append"><button type="submit" class="border-300 btn btn-outline-secondary btn-sm">Apply</button></div>
         </div>
      </form>
      <script src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js" data-preference-id={{$preference->id}}></script>
   </div>
</div>

<script src="{{ asset('/../angular/controller/ShoppingCartController.js') }}" defer></script>
@endsection
