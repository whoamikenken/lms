<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'year',
        'isRemove',
        'created_at',
        'updated_at',
    ];

    public function categoryQuestions()
    {
        return $this->hasMany(Question::class, 'category_id', 'id');
    }
}
