<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nationality extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nationalities';

    protected $guarded = [];

    public function student() {
        return $this->hasMany(Student::class);
    }
}
