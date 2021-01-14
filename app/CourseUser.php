<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseUser extends Model
{

    protected $table = 'course_user';

    protected $fillable = [
        'user_id', 'course_id'
    ];

    use HasFactory;

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
