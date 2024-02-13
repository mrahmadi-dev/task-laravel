<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    protected $appends = [
        'status',
    ];

//    public function getStatusAttribute()
//    {
//        return $this->attributes['is_completed'] ? 'completed' : 'pending';
//    }
}
