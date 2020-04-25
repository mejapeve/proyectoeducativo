<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MyResetPassword;
use App\Notifications\WelcomeMail;
use Illuminate\Auth\Passwords\PasswordBroker;

class AfiliadoEmpresa extends Model
{
    //
    use Notifiable;

    protected $table="afiliado_empresas";

    protected $fillable=[
        'user_name',
        'name',
        'last_name',
        'email',
        'url_image',
        'country_id',
        'department_id',
        'city_id',
        'city',
    ];
   // protected $guarded = ['id'];

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

        $role = Roles::where('name',$rol) ->first();
        $company =  Companies::where('nick_name',session('name_company'))->first();
        if(AffiliatedCompanyRole::where([
            ['affiliated_company_id',auth('afiliadoempresa')->user()->id],
            ['rol_id',$role->id],
            ['company_id',$company->id],
        ])->first()){
            return true;
        }

        return false;
    }


    ///////////
    ///
    public function companies()
    {
        return $this->belongsToMany('App\Models\Companies','affiliated_company_roles','affiliated_company_id','company_id')->withTimestamps();
    }

    public function hasCompany($company){
        if ($this->companies()->where('nick_name', $company)->first()) {
            return true;
        }
        return false;
    }

    public function company_teacher_rol (){

        return $this->hasMany(AffiliatedCompanyRole::class,'affiliated_company_id','id');

    }

    public function country (){

        return $this->belongsTo(Country::class,'country_id','id');

    }
	public function cityName (){

        return $this->belongsTo(City::class,'city_id','id');

    }

    public function affiliated_company (){

        return $this->hasMany(AffiliatedCompanyRole::class,'affiliated_company_id','id');
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token,session('name_company'),session('rol')));
    }
	
	public function sendWelcomeNotification($rol)
    {
        $token = app(PasswordBroker::class)->createToken($this);
        $this->notify(new WelcomeMail($token, session('name_company'),$rol));
    }

	public function company_name() {
        return session('name_company' );
    }

    public function affiliated_account_services (){

        return $this->hasMany(AffiliatedAccountService::class,'company_affiliated_id','id');
    }

}
