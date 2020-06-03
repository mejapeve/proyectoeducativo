<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\Companies;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/inicio';
    protected $requestReset;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(Request $request, $empresa, $rol)
    {
        //dd($request,$empresa,$rol);

        //$redirectTo->
        session(['name_company' => $empresa]);
        $company = Companies::where('nick_name', $empresa)->first();
        session(['company_id' => $company->id]);
        switch (intval($rol)) {
            case 1:
                $this->redirectTo = $empresa . "/student";
                break;
            case 2:
                $this->redirectTo = $empresa . "/teacher";
                break;
            case 3:
                $this->redirectTo = $empresa . "/tutor";
                break;
            case 4:
                $this->redirectTo = $empresa . "/admin";

                break;
        }
        $request->validate($this->rules(), $this->validationErrorMessages());
        $this->requestReset = $request;
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );



        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($request, $response)
            : $this->sendResetFailedResponse($request, $response);
    }
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard('afiliadoempresa')->login($user);
        session(['password_hash' => $user->password]);

    }
}
