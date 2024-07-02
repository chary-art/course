<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $language = 'tk';
        if(request('language'))
        {
            $language = request('language');
            session()->put('language', $language);
        }elseif(session('language'))
        {
            $language = session('language');
        }
        app()->setLocale($language);

        return $next($request);
    }
}
