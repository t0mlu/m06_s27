<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckRequiredCountryFields
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = validator::make($request->all(), [
            "code" => "required",
            "name" => "required",
            "continent" => "required",
            "region" => "required",
            "surfaceArea" => "required",
            "population" => "required",
            "localName" => "required",
            "governmentForm" => "required",
            "code2" => "required"
        ]);

        return $validator->fails() ?
            response()->json(["errors" => $validator->errors()])
            : $next($request);
    }
}
