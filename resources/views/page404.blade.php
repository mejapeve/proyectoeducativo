@extends('layouts.app_side')

@section('content')

<div class="flex-center min-vh-100 py-6 row ">
   <div class="col-xxl-5 col-sm-11 col-md-9 col-lg-7 col-xl-6">
      <a class="text-decoration-none" href="/">
         <div class="d-flex flex-center font-weight-extra-bold fs-5 mb-4"><img class="mr-2" src="/static/media/falcon.920a9ff0.png" alt="Logo" width="58"><span class="text-sans-serif">falcon</span></div>
      </a>
      <div class="text-center card">
         <div class="p-5 card-body">
            <div class="display-1 text-200 fs-error">404</div>
            <p class="lead mt-4 text-800 text-sans-serif font-weight-semi-bold">The page you're looking for is not found.</p>
            <hr>
            <p>Make sure the address is correct and that the page hasn't moved. If you think this is a mistake,<a href="mailto:info@exmaple.com" class="ml-1">contact us</a>.</p>
            <a class="btn btn-primary btn-sm mt-3" href="/">
               <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" class="svg-inline--fa fa-home fa-w-18 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                  <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
               </svg>
               Take me home
            </a>
         </div>
      </div>
   </div>
</div>

@endsection