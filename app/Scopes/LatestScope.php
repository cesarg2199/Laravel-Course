<?php 

/*
Scopes are good for adding to the query builder automatically without having to explicitly 
defining it in the query everytime. the apply method is added everytime. 
*/

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LatestScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        //$builder->orderBy('created_at', 'desc');
        $builder->orderBy($model::CREATED_AT, 'desc');

    }
}