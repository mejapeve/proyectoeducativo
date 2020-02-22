@extends('layouts.app')

@section('content')

<div class="flex-center min-vh-100 py-6 row">
   <div class="col-xxl-5 col-sm-11 col-md-9 col-lg-7 col-xl-6">
      <a class="text-decoration-none" href="/">
         <div class="d-flex flex-center font-weight-extra-bold fs-5 mb-4"><img class="mr-2" src="/static/media/falcon.920a9ff0.png" alt="Logo" width="58"><span class="text-sans-serif">falcon</span></div>
      </a>
      <div class="text-center card">
         <div class="p-5 card-body">
            <div class="display-1 text-200 fs-error">500</div>
            <p class="lead mt-4 text-800 text-sans-serif font-weight-semi-bold">Whoops, something went wrong!</p>
            <hr>
            <p>Try refreshing the page, or going back and attempting the action again. If this problem persists,<a href="mailto:info@exmaple.com" class="ml-1">contact us</a>.</p>
         </div>
      </div>
   </div>
</div>

@endsection