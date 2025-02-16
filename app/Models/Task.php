<?php

namespace App\Models;

use App\Events\TaskUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'complete',
    ];

    /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::created(function ($task) {
            broadcast(new TaskUpdated($task))->toOthers();
        });

        static::updated(function ($task) {
            broadcast(new TaskUpdated($task))->toOthers();
        });
    }

}
