<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'amount', 'instructor_part', 'elearning_part', 'email'
    ];

    public function course()
    {
        return $this->belongsTo('App/Course');
    }
}
