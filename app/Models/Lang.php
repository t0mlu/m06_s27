<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;

    protected $table = "language";
    protected $primaryKey = "lang";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = false;

    protected $fillable = [
        "lang"
    ];

    public function countries()
    {
        return $this->belongsToMany(Country::class, "countrylanguage", "Language", "CountryCode");
    }
}
