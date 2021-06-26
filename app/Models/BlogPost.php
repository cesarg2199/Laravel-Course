<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    #how to do mass assingmnet with the create instance method 
    protected $fillable = ['title', 'content'];
    use HasFactory;
}
