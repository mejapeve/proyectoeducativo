@extends('layouts.app_side')

@section('content')

<div class="card" ng-controller="shoppingCartController" ng-init="init()">
   <div class="card-header">
      <div class="align-items-center row">
         <div class="col">
            <h5 class="mb-sm-0">Carrito de Compras</h5>
         </div>
         <div class="text-sm-right col-sm-auto">
            @guest('afiliadoempresa')
            <h5 class="d-flex justify-content-end bg-light card-footer" style="bottom: 10px;">
               <button class="btn btn-outline-primary" ng-click="onRegistryWithPendingShoppingCart()">
               <span class="fs-lg-0 fs-md-0 fs-sm--1">Continuar Compra</span></button>
            </h5>
            @endguest
			<form id="simulate-form" action="{{ route('notification_gwpayment_callback') }}" method="GET" style="display: none;">
               @csrf
			   <input type="text" name="payment_transaction_id" value="{{$preference->id}}"/>
               </form>
            @auth('afiliadoempresa')
			@if($preference->id)
            <h5 class="d-flex justify-content-end bg-light card-footer" style="bottom: 10px;">
               <button class="btn btn-outline-primary" onclick="event.preventDefault(); document.getElementById('simulate-form').submit();">
               <span class="fs-lg-0 fs-md-0 fs-sm--1">Simular Pago</span></button>
            </h5>
            <h5 class="d-flex justify-content-end bg-light card-footer" style="bottom: 10px;">
               <a class="btn btn-outline-primary" ng-href="/formulario_de_envio">
               <span class="fs-lg-0 fs-md-0 fs-sm--1">Continuar Compra</span></a>
            </h5>
			@endif
            @endauth
         </div>
      </div>
   </div>
   <div class="p-0 card-body">
      <div class="bg-200 text-900 px-1 fs--1 font-weight-semi-bold no-gutters row">
          <div class="p-2 px-md-3 col-9 col-md-8">Nombre</div>
          <div class="px-3 col-3 col-md-4">
              <div class="row">
                  <div class="text-right p-2 px-md-3col-md-4">Precio</div>
              </div>
          </div>
      </div>
      <div class="align-items-center px-1 border-bottom border-200 no-gutters row" ng-repeat="shopping_cart in shopping_carts">
         <div ng-show="shopping_cart.rating_plan">
            <h5 class="fs-0"><a class="text-900">@{{shopping_cart.rating_plan.name}}</a></h5>
            <h4 class="fs-0"><a class="text-600">@{{shopping_cart.rating_plan.description}}</a></h4>
            <h4 class="fs-0"><a class="text-600">@{{shopping_cart.rating_plan.price}}</a></h4>
         </div>
         <div ng-repeat="shopping_cart_product in shopping_cart.shopping_cart_product">
                  <div><li class="text-900">@{{shopping_cart_product.product_id}}</li></div>
                  <div ng-show="shopping_cart_product.sequence">
                     <div><li class="text-900">@{{shopping_cart_product.sequence.name}}</li></div>
                     <img class="rounded mr-3 d-none d-md-block" src=@{{shopping_cart_product.sequence.url_image}} alt="" width="120">
                  </div>
                  <div ng-show="shopping_cart_product.kiStruct">
                     <div><li class="text-900">@{{shopping_cart_product.kiStruct.name}}</li></div>
                     <div><li class="text-900">@{{shopping_cart_product.kiStruct.description}}</li></div>
                     <div><li class="text-900">@{{shopping_cart_product.kiStruct.price}}</li></div>
                     <img class="rounded mr-3 d-none d-md-block" src=@{{shopping_cart_product.kiStruct.url_image}} alt="" width="120">
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
    @guest('afiliadoempresa')
    <h5 class="d-flex justify-content-end bg-light card-footer" style="bottom: 10px;">
       <button class="btn btn-outline-primary" ng-click="onRegistryWithPendingShoppingCart()">
       <span class="fs-lg-0 fs-md-0 fs-sm--1">Continuar Compra</span></button>
    </h5>
    @endguest
    @auth('afiliadoempresa')
    <h5 class="d-flex justify-content-end bg-light card-footer" style="bottom: 10px;">
       <button class="btn btn-outline-primary" ng-click="onSimulateTest()">
       <span class="fs-lg-0 fs-md-0 fs-sm--1">Simular Pago</span></button>
    </h5>
    <h5 class="d-flex justify-content-end bg-light card-footer" style="bottom: 10px;">
       <a class="btn btn-outline-primary" ng-href="/formulario_de_envio">
       <span class="fs-lg-0 fs-md-0 fs-sm--1">Continuar Compra</span></a>
    </h5>
    @endauth
</div>

<script src="{{ asset('/../angular/controller/ShoppingCartController.js') }}" defer></script>
@endsection
