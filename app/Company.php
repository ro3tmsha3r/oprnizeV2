<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Company extends Model
{
    use HasTranslations, SoftDeletes;
    public $translatable = ['name'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
