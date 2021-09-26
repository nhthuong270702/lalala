<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    protected $table='grade_student';
    public $timestamps=false;
    protected $fillable=[
        'student_id',
        'grade_id',
    ];

}
