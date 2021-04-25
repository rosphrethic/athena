<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habilitation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'habilitations';

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function course() {
        return $this->hasMany(Course::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
