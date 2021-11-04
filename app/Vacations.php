<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacations extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function typeVacation(){
        return $this->belongsTo(Typevacations::class,'typevacation_id');
    }
}
