<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionResult extends Model
{
    use HasFactory;
    public $table = 'question_result';
    
    protected $fillable = [
        'result_id',
        'question_id',
        'option_id',
        'points',
        'category_id',
        'category_text',
        'course',
    ];

    public function result()
    {
        return $this->belongsTo(Result::class, 'result_id', 'id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
