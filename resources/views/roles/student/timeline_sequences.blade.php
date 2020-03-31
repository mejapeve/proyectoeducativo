<div ng-controller="contentSequencesStudentCtrl" ng-init="init(1)">
	<div ng-show="errorMessage" class="fade-message d-none-result d-none alert alert-danger p-1 pl-2 row">
	 <span class="col">@{{ errorMessage }}</span>
	 <span class="col-auto"><a ng-click="errorMessage = null"><i class="far fa-times-circle"></a></i></span>
	</div>

	<div class="mb-3 card">
		<div class="card-body">
TIMELINE		   
		</div>   
	</div>
</div>
@section('js')
    <script src="{{ asset('angular/controller/timelineSequencesStudentCtrl.js') }}" defer></script>
@endsection