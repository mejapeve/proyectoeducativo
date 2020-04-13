@extends('layouts.app')

@section('content_layout')
	
	@include('roles/tutor/tutor_sidebar')
	<div class="content">

		@include('roles/tutor/tutor_navbar')
		<div class="row p-lg-4 p-md-3 p-sm-2 sticky-margin-top-ie">
			@yield('content')
		</div>

		<footer>
			@include('layouts/footer')
		</footer>
	</div>
	
@endsection
