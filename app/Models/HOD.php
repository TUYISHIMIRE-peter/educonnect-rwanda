<?php

namespace App\Models;

use App\Models\School;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HOD extends Model
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'head_teacher';
    use HasFactory;
    protected $fillable = ['school_id', 'first_name', 'last_name', 'email', 'password', 'phone'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
