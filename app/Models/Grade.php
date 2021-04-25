<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'grades';

    protected $guarded = [];

    public function course() {
        return $this->hasMany(Course::class);
    }
}
