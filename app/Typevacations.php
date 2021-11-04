<?php

namespace App;

use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Typevacations extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    public static function booted()
    {
        //static::addGlobalScope(new CompanyScope);
    }
    
}
