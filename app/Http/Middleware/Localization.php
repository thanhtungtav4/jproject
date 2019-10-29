<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Localization
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
        $oRoute = $request->route()->action;

        $locale = @$oRoute['lang'];

        if(!$locale){
            return redirect()->route(getValueByLang('frontend.home_', 'vi'));
        }

        if (!in_array($locale, Config::get('app.locales'))) {
            return redirect()->route(getValueByLang('frontend.home_', 'vi'));
        }

        \Session::put('locale', $locale);
        App::setLocale($locale);

        $params = $request->route()->parameters;

        $route = substr($oRoute['as'], 0, -2);

        $arrLocales = Config::get('app.locales');

        if($params){
            $keyParams = collect($params)->keys()->first();
            $valueParams = collect($params)->values()->first();

            $arrSlug = DB::table('tpcloud_cms_page_slug')
                ->where(getValueByLang('alias_', $locale), $valueParams)
                ->where('route', substr($oRoute['as'], 0, -3))
                ->first();

            if(!$arrSlug){
                return $next($request);
            }

            $arrRoute =  [
                $locale => route(getValueByLang($route, $locale), $params)
            ];

            foreach ($arrLocales as $itemLocale){
                if($itemLocale != $locale){
                    $field = getValueByLang('alias_', $itemLocale);
                    $arrRoute[$itemLocale] = route(getValueByLang($route, $itemLocale), [$keyParams => $arrSlug->$field]);
                }
            }
        } else {
            $arrRoute =  [
                $locale => route(getValueByLang($route, $locale))
            ];

            foreach ($arrLocales as $itemLocale){
                if($itemLocale != $locale){
                    $arrRoute[$itemLocale] = route(getValueByLang($route, $itemLocale));
                }
            }
        }

        $request->session()->put('arrRoute', $arrRoute);
        return $next($request);
    }
}
