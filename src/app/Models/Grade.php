<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\GradeResource;


class Grade extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='grades';
    protected $fillable = [
        'id','name'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    // Triển khai code logic
    public static function saveGrade($id, $name)
    {
        $grade = new Grade();
        $grade->id = $id;
        $grade->name = $name;
        $grade ->save();
    }

    public static function updateGrade($id, $name)
    {
        $grade = Grade::first();
        $grade->id = $id;
        $grade->name = $name;

        $grade->save();
    }

    public static function showAllGrade()
    {
        $grades = Grade::all();
        return response([ 'grades' => GradeResource::collection($grades), 'message' => 'Retrieved successfully'], 200);
    }

    public static function showGrade($id)
    {
        $grades = Grade::find($id);
        return $grades;
    }
    // public static function updateGrade(Request $request, Grade $grade)
    // {
    //     $grade->update($request->all());
    //     return response([ 'grade' => new GradeResource($grade), 'message' => 'Retrieved successfully'], 200);
    // }

    public static function deleteGrade($id)
    {
        Grade::first()->delete();

        return back();
    }
    public static function restoreGrade($id)
    {
        Grade::withTrashed()->find($id)->restore();

        return back();
    }


    public static function countStudentInGrade(Grade $grade)
    {
        return $grade->students->count();
    }
    public static function showAllClassStudent(){
        $grades=Grade::all();
        foreach($grades as $grade){
           echo $grade->name.":";
           foreach($grade->students as $student){
               echo $student->name.',';
           }
           echo "<br>";
        }
    }
    public static function showStudentsInGrade(Grade $grade)
    {
        return $grade->students;
    }
}

