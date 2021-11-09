<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Administration extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    public function Sections(){
        return $this->hasMany(Section::class);
    }
}
