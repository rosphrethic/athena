<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cause extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'causes';

    protected $guarded = [];

    public function justificationStudent() {
        return $this->hasMany(JustificationStudent::class);
    }

    public function sanctionStudent() {
        return $this->hasMany(SanctionStudent::class);
    }

    public function desertionStudent() {
        return $this->hasMany(DesertionStudent::class);
    }
}
