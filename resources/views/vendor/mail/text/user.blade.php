<div hidden>


    {!! html_entity_decode('<h3></h3>') !!}

</div>
<table class="action" align="" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td>
                                    <h3>Usuario: {{$user->user_name}}</h3>
                                    @foreach($user->affiliated_company as $company_rol)
                                        <h4>empresa: {{$company_rol->company->name}} rol: {{$company_rol->rol->name}}</h4>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
