<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [ 'created_at', 'updated_at', 'deleted_at' ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
