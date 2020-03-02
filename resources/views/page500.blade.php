@extends('layouts.app')
@section('content')
<div class="flex-center min-vh-100 py-6 row">
   <div class="col-xxl-5 col-sm-11 col-md-9 col-lg-7 col-xl-6">
      <div class="text-center card">
         <div class="p-5 card-body">
            <div class="display-1 text-200 fs-error">500</div>
            <p class="lead mt-4 text-800 text-sans-serif font-weight-semi-bold">Whoops, algo ha salido mal!</p>
            <hr>
            <p>
               El Link al que intenta acceder no es válido, por favor verifique el link de acceso 
               @if(!empty($companies))
               <select onchange="location=this.value">
                  <option></option>
                  @foreach ($companies as $company)
                  <option value="{{ asset($company->nick_name . '/loginform')}}"> {{$company->name}}</option>
                  @endforeach
               </select>
               @endif
            </p>
         </div>
      </div>
   </div>
</div>
@endsection