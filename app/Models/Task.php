<?php

namespace App\Models;

use App\Enum\TaskStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as BuilderAlias;
use PhpParser\Builder;


class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'status_modified_at',
    ];


    public function scopeFilterPendingTasks($query)
    {
        return $query->where('status',TaskStatus::PENDING)
            ->orderByDesc('created_at');
    }
    public function scopeFilterCompletedTasks($query)
    {
        $date_condition = Carbon::now()->subDays(config('constants.latest_days_records'))->toDateTimeString();
        return $query->where('status',TaskStatus::COMPLETED)
            ->where('created_at','>=',$date_condition)
            ->orderByDesc('created_at');
    }

    public function scopeFilterTasks($query)
    {
        return $query->where('status',TaskStatus::PENDING)
            ->orWhere(function ($query) {
                $query->where('status',TaskStatus::COMPLETED)
                    ->where('created_at','>=',Carbon::now()->subDays(config('constants.latest_days_records'))->toDateTimeString());
            })->orderByDesc('created_at');
    }

//    protected $appends = [
//        'status',
//    ];

//    public function getStatusAttribute()
//    {
//        return $this->attributes['is_completed'] ? 'completed' : 'pending';
//    }
}
