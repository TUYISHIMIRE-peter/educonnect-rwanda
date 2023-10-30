<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "location"
        ];
    public function headTeacher()
    {
        return $this->hasOne(User::class);
    }

    public function teachers()
    {
        return $this->hasMany(User::class);
    }
}


