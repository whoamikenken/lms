<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;

    public $table = 'results';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start_time',
        'end_time',
       
    ];

    protected $fillable = [
        'user_id',
        'year',
        'course',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
        'deleted_at',
        'total_points',
        'grade',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot(['option_id', 'points']);
    }
}
