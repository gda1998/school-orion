<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [ 'created_at', 'updated_at', 'deleted_at' ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_details')
        ->withPivot('qualification')
        ->withTimestamps();
    }
}
