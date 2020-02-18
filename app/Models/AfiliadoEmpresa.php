<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
class AfiliadoEmpresa extends Model
{
    //
    use Notifiable;

    protected $table="afiliado_empresas";

    protected $fillable = [
        'nombre', 'correo', 'password',
    ];
    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Roles','afiliado_empresa_roles','afiliado_empresa_id','rol_id')->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole($rol)
    {

        $role = Roles::where('name',$rol) ->first();//$this->roles()->where('name', $rol)->first();
        $company =  Companies::where('name',session('name_company'))->first();
        $affiliatedCompany = AffiliatedCompany::where([
           ['company_id',$company->id],
           ['affiliated_id',auth('afiliadoempresa')->user()->id],
        ])->first();
        //dd($role);
        if(AffiliatedCompanyRole::where([
            ['affiliated_company_id',$affiliatedCompany->id],
            ['rol_id',$role->id],
        ])->first()){
            return true;
        }
        /*if ($this->roles()->where('name', $role)->first()) {
            //dd($this->roles()->where('name', $role)->first());
            dd(auth('afiliadoempresa')->user());
            return true;
        }*/
        return false;
    }


    ///////////
    ///
    public function companies()
    {
        return $this->belongsToMany('App\Models\Companies','affiliated_companies','affiliated_id','company_id')->withTimestamps();
    }

    public function hasCompany($company){
        if ($this->companies()->where('name', $company)->first()) {
            return true;
        }
        return false;
    }


}
