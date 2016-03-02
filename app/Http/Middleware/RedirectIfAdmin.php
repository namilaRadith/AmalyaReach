<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		if(!$request->user()->isAdmin()){
			return "you are not a admin";
		}


		return $next($request);


	}

}
