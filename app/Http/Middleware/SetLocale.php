<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class SetLocale
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
        // $extension = pathinfo($_SERVER['SERVER_NAME'], PATHINFO_EXTENSION);
    
        // if($extension == "com"){
        //  session(['locale' => "en"]);
        // }

        // if($extension == "nl"){
        //  session(['locale' => "nl"]);
        // }

        if(Session::get('locale') == null){
            session(['locale' => 'nl']);
        }
        
        if(Session::has('locale')) {
        app()->setLocale(Session::get('locale'));
    }
    return $next($request);
    }
}
