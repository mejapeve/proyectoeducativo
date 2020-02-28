<h3>'nombre de usuario:'{{$user->user_name}}</h3>
@foreach($user->affiliated_company as $company_rol)
    <h4>{{'empresa: '.$company_rol->company->name}}</h4>
@endforeach