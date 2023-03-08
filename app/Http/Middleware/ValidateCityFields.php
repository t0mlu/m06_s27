<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ValidateCityFields
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
            "Name" => ["string", "min:2", "max:35"],
            "CountryCode" => ["string", "min:2", "max:3", "exists:App\Models\Country,Code"],
            "District" => ["string", "min:2", "max:20"],
            "Population" => ["integer", "max:2147483647"]
        ]);

        return $validator->fails() ?
            response()->json(["errors" => $validator->errors()])
            : $next($request);
    }
}
