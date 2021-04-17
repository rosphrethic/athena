<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'guardians';

    protected $guarded = [];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function student() {
        return $this->hasMany(Student::class);
    }
}
