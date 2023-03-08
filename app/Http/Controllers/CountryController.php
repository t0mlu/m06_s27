<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    public function __construct()
    {
        // API implementation

        /*$this->middleware("requiredCountryFields")->only("store");
        $this->middleware("countryFields")->only("store", "update");*/

        // Web implementation
        $this->middleware('requiredCountryFields')->only('store');
        $this->middleware('countryFields')->only('store', 'update');
    }

    public function index()
    {
        // API implementation

        // return response()->json(Country::with("cities", "languages")->get());


        // View implementation

        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        $aux = new Country();
        $fillable = $aux->getFillable();
        return view('countries.create', compact('fillable'));
    }

    public function store(Request $request)
    {

        // API implementation

        /*$country = Country::create($request->all());
        if ($request->has("Cities")) {
            foreach ($request->cities as $city) {
                $city["CountryCode"] = $country->code;
                City::create($city);
            }
        }
        $country->cities;
        return response()->json($country, 201);*/


        // Web implementation

        Country::create($request->all());
        return redirect()->route('countries.index');
    }

    public function show(Country $country)
    {
        // API implementation

        /*$country->cities;
        $country->languages;
        return response()->json($country);*/


        // Web implementation

        return view('countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        // Web implementation
        $aux = new Country();
        $fillable = $aux->getFillable();
        return view('countries.edit', compact('country', 'fillable'));
    }

    public function update(Request $request, Country $country)
    {
        // API implementation

        /*$country->fill($request->all())->save();
        return response()->json($country);*/


        // Web implementation

        $country->update(array_filter($request->all()));
        return redirect()->route('countries.index');
    }

    public function destroy(Country $country)
    {
        // API implementation

        /*$country->delete();
        return response()->noContent();*/
    }
}
