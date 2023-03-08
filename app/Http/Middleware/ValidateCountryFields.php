<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ValidateCountryFields
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
        $tenTwoDecimal = "between:0.01,99999999.99";

        $validator = validator::make($request->all(), [
            "code" => ["nullable", "string", "min:1", "max:3"],
            "name" => ["nullable", "string", "min:2", "max:52"],
            "continent" => [
                "nullable",
                Rule::in(
                    ["Asia", "Europe", "North America", "Africa", "Oceania", "Antarctica", "South America"]
                )
            ],
            "region" => ["nullable", "string", "min:2", "max:26"],
            "surfaceArea" => ["nullable", "numeric", $tenTwoDecimal],
            "indepYear" => ["nullable", "integer", "nullable", "max:32767"],
            "population" => ["nullable", "integer"],
            "lifeExpectancy" => ["nullable", "numeric", "between:0.1,99.9"],
            "GNP" => ["nullable", "numeric", $tenTwoDecimal],
            "GNPOld" => ["nullable", "numeric", $tenTwoDecimal],
            "localName" => ["nullable", "string", "min:2", "max:45"],
            "governmentForm" => ["nullable", "string", "min:2", "max:45"],
            "headOfState" => ["nullable", "string", "nullable", "min:2", "max:60"],
            "capital" => ["nullable", "integer"],
            "code2" => ["nullable", "string", "min:1", "max:2"],
            "cities" => ["nullable", "array"],
            "cities.*.Name" => ["string", "min:2", "max:35"],
            "cities.*.District" => ["string", "min:2", "max:20"],
            "cities.*.Population" => ["integer", "max:2147483647"]

        ]);

        return $validator->fails() ?
            response()->json(["errors" => $validator->errors()])
            : $next($request);
    }
}
