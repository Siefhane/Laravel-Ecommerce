<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NameIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $name = $request->get('name');
        $title = $request->get('title');

        if (str_contains(strtolower($name), 'amazon') || str_contains(strtolower($title), 'amazon')) {
            return response()->json(['error' => 'Product or category name cannot contain the keyword "amazon"'], 400);
        }

        return $next($request);
    }
}
