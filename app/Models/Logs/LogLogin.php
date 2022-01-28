<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class LogLogin extends Model
{
    protected $fillable = ['user_id', 'email', 'ip', 'success'];

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeAttemptsByEmail($query, $email)
    {
        return $query->where('email', $email)->orderBy('created_at', 'asc');
    }
}
