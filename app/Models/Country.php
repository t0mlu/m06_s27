<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = "country";
    protected $primaryKey = "Code";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = false;

    protected $fillable = [
        "code",
        "name",
        "continent",
        "region",
        "surfaceArea",
        "indepYear",
        "population",
        "lifeExpectancy",
        "GNP",
        "GNPOld",
        "localName",
        "governmentForm",
        "headOfState",
        "capital",
        "code2"
    ];

    public function cities()
    {
        return $this->hasMany(City::class, "CountryCode", "Code");
    }

    public function languages()
    {
        return $this->belongsToMany(Lang::class, "countrylanguage", "CountryCode", "Language");
    }
}
