<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'students';

    protected $guarded = [];

    public function nationality() {
        return $this->belongsTo(Nationality::class);
    }

    public function guardian() {
        return $this->belongsTo(Guardian::class);
    }

    public function course() {
        return $this->hasMany(Course::class);
    }
}
