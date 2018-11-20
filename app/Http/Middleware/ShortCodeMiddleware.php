<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ShortCodeMiddleware
{
    use DispatchesJobs;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var $response Response */
        $response = $next($request);

        if ( ! method_exists($response, 'content')) {
            return $response;
        }

        $content = preg_replace_callback_array(
            [
                '#(<p(.*)>)?{form}(<\/p>)?#' => function () {
                    return view('layouts.shortcodes.form_order');
                },
                '#(<p(.*)>)?{tariffs}(<\/p>)?#' => function () {
                    return view('layouts.shortcodes.tariffs');
                }
            ],
            $response->content()
        );

        $response->setContent($content);

        return $response;
    }
}
