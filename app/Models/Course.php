<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * This allows us to use Course::create() with these fields
     */
    protected $fillable = [
        'course_name',
        'description',
    ];

    /**
     * Get all students enrolled in this course
     * Relationship: One course has many students
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}