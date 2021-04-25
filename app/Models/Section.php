<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'sections';

    protected $guarded = [];

    public function course() {
        return $this->hasMany(Course::class);
    }
}
