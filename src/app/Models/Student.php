<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\StudentResource;

class Student extends Model
{
    use SoftDeletes;
    protected $table='students';
    protected $fillable = [
        'id','name'
    ];

    public function grades()
    {
        return $this->belongsToMany(Grade::class);
    }
    // Triển khai code logic
    public static function saveStudent($id, $name)
    {
        $student = new Student();
        $student->id = $id;
        $student->name = $name;
        $student ->save();
    }

    public static function updateStudent($id, $name)
    {
        $student = Student::first();
        $student->id = $id;
        $student->name = $name;

        $student->save();
    }

    public static function showAllStudent()
    {
        $students = Student::all();
        return response([ 'students' => studentResource::collection($students), 'message' => 'Retrieved successfully'], 200);
    }

    public static function showStudent($id)
    {
        $students = student::find($id);
        return $students;
    }
    // public static function updatestudent(Request $request, student $student)
    // {
    //     $student->update($request->all());
    //     return response([ 'student' => new studentResource($student), 'message' => 'Retrieved successfully'], 200);
    // }

    public static function deleteStudent(Student $student)
    {
       $student->delete();
    }
    public static function countStudent()
    {
        $students = Student::all()->count();
        return $students;
    }
    protected $dates = ['deleted_at'];
}
