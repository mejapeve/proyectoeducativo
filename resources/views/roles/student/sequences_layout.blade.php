@extends('layouts.app')

@section('content_layout')
<style> 
body { background-color: white } 
</style> 
    <div class="content">
        <div class="row p-lg-4 p-md-3 p-sm-2 sticky-margin-top-ie">
            @yield('content')
        </div>

        <footer>
            @include('layouts/footer')
        </footer>
    </div>

@endsection
