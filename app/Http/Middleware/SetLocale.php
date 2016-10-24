<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale =
            presence($request->input('locale')) ??
            presence($request->cookie('locale')) ??
            locale_accept_from_http($request->server('HTTP_ACCEPT_LANGUAGE'));
        $locale = get_valid_locale($locale);
        App::setLocale($locale);
        $response = $next($request);
        if (method_exists($response, 'withCookie')) {
            return $response->withCookie(cookie()->forever('locale', $locale));
        } else {
            return $response;
        }
    }
}
