<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseRequirement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'course_requirement';

    protected $guarded = [];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function requirement() {
        return $this->belongsTo(Requirement::class);
    }
}
