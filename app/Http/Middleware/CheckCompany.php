<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Companies;

class CheckCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $empresa = $request->route('empresa');
        $company = Companies::where('nick_name', $empresa)->first();
        if($company) {
            return $next($request);
        }
        else {
            return redirect()->route('page500');
        }
    }
}
