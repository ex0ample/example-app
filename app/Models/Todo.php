<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title','user_id','description', 'is_completed'];

    protected static function booted(): void 
    {
        static::creating(function (Todo $todo) {
            $todo->user_id = auth()->id();
        });
    }
}
