<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        "course_name",
        "number_of_credits",
        "semester",
    ];
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
