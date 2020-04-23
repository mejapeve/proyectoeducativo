<?php

namespace App\Http\Middleware;

use Closure;

class CheckCompanyAffiliated
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

        if (! $request->user('afiliadoempresa')->hasCompany(session('name_company'))) {
            return redirect('home');
        }

        return $next($request);
    }
}
