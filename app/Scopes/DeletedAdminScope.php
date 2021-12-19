<?php

/*
Scopes are good for adding to the query builder automatically without having to explicitly
defining it in the query everytime. the apply method is added everytime.
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class DeletedAdminScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if(Auth::check() && Auth::user()->is_admin){
            $builder->withTrashed();
        }
    }
}
