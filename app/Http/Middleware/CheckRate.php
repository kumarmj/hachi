<?php

namespace App\Http\Middleware;

use Closure;

class CheckRate
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
        $curl = curl_init('https://api.github.com/rate_limit');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_USERAGENT, 'TechAssign');
		$response = json_decode(curl_exec($curl), true);

        if($response['resources']['search']['remaining'] >= 0)
            return $next($request);
        else {
            return redirect()->route('index');
        }
    }
}
