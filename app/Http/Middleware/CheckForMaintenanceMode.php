<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckForMaintenanceMode
{

    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;
    protected $ips =
        [
            '172.21.0.1',
            '244.244.244.244'

        ];
    protected $except =
        [
            'info/politicas-de-privacidad',
            'info/terminos-y-condiciones'
        ];
    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }


    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ($this->app->isDownForMaintenance() && !in_array($request->getClientIp(), $this->ips))
        {
            //dd($request->getClientIp(), $this->ips);
            //Reviso si esta en la excepcion
            foreach ($this->except as $except) {
                if ($except !== '/') {
                    $except = trim($except, '/');
                }

                if ($request->is($except)) {
                    return $next($request);
                }

            }
            return response()->view('errors.503');
        }

        return $next($request);
    }
}