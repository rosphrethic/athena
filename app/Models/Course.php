<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'courses';

    protected $guarded = [];

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function baccalaureate() {
        return $this->belongsTo(Baccalaureate::class);
    }

    public function curriculum() {
        return $this->hasMany(Curriculum::class);
    }

    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    public function requirement() {
        return $this->hasMany(Requirement::class);
    }
    
    public function schedule() {
        return $this->hasMany(Schedule::class);
    }

    public function evaluation() {
        return $this->hasMany(Evaluation::class);
    }

    public function attendanceStudent() {
        return $this->hasMany(AttendanceStudent::class);
    }

    public function sanctionDesertion() {
        return $this->hasMany(SanctionDesertion::class);
    }
}
