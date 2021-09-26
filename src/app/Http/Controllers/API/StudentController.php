<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::showAllStudent();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {

        $data = $request->all();

        Student::saveStudent($data['id'], $data['name']);

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $data = Student::showStudent($student);
        return $data;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request)
    {

        $data = $request->all();

        Student::updateStudent($data['id'], $data['name']);

        return $data;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Student $student
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Student $student)
    {
        Student::deleteStudent($student);

        return 'deleted';
    }
    public function countStudent(){
        return Student::countStudent();
    }
}
