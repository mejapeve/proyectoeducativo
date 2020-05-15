@extends('roles.tutor.layout')

@section('content-tutor-index')
   <div class="d-none-result d-none" ng-controller="tutorProductsCtrl" ng-init="init()" >
	@include('shopping/pending_shopping_cart')
   </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/tutorProductsCtrl.js')}}"></script>
@endsection