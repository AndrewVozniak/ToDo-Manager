<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'term',
        'status',
    ];

    public function subtasks()
    {
        return $this->hasMany(Subtask::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
            $user->subtasks()->delete();
        });
    }
}
