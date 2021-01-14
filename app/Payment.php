<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
