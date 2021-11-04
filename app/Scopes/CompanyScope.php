<?php

namespace App\Scopes;

use App\Company;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class CompanyScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        if (Auth::user()){
            $builder->where('company_id', Auth::user()->company);
        }

    }
}
