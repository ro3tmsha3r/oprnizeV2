<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Employee extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    
}
