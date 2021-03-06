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
            '181.60.148.128',
            '190.158.137.166',
            '181.50.5.192',
            '190.90.3.19',
            '190.158.23.65',
            '166.210.32.164',
            '166.210.32.101',
            '190.158.67.85',
            '181.51.93.117',
            '167.0.154.176',
            '181.51.65.19',
            '181.59.80.216',//cata,
            '181.61.86.199',
            '191.149.186.15',
            '186.87.244.126',//cata,
            '190.146.85.8',//
            '181.234.203.69',
            '186.113.165.128',
            '186.96.124.42'
        ];
    protected $except =
        [
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