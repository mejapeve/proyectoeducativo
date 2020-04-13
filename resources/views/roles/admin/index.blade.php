@extends('layouts.app_side')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                @include('roles/admin/sidebar')
                <div class="col-md-8">
                    <div class="mb-3 card">
                        <div class="card-header"><h5 class="mb-0">VISTA ESTUDIANTE</h5></div>
                        <div class="bg-light card-body">
                            <div dir="ltr"
                                 style="position: relative; text-align: left; box-sizing: border-box; padding: 0px; overflow: hidden; white-space: pre; font-family: monospace; color: rgb(248, 248, 242); background-color: rgb(40, 42, 54);">
                            </div>
                            <p>Mi perfil</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('/../angular/controller/HomePageController.js')}}"></script>
@endsection