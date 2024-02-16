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
        'status',
        'status_modified_at',
    ];

//    protected $appends = [
//        'status',
//    ];

//    public function getStatusAttribute()
//    {
//        return $this->attributes['is_completed'] ? 'completed' : 'pending';
//    }
}
