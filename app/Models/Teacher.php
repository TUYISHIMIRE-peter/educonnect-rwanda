<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Teacher extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "password",
        "phone",
    ];
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function headTeacher()
    {
        return $this->belongsTo(User::class);
    }
   
    
}
