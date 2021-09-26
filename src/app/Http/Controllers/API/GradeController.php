<?php

namespace App\Http\Controllers\API;

use App\Models\Grade;
use App\Http\Controllers\Controller;
use App\Http\Resources\GradeResource;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Grade::showAllGrade();
        return $data;
    }

    public function show(Grade $grade)
    {
        $data = Grade::showGrade($grade);
        return $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {

        $data = $request->all();

        Grade::saveGrade($data['id'], $data['name']);

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeRequest $request)
    {

        $data = $request->all();

        Grade::updateGrade($data['id'], $data['name']);

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Grade $grade
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Grade $grade)
    {
        Grade::deleteGrade($grade);

        return 'deleted';
    }

    public function countStudentInGrade(Grade $grade){
        return Grade::countStudentInGrade($grade);
    }

    public function allClassStudent(){
        $data = Grade::showAllClassStudent();
        return $data;
    }
    public function showStudentInGrade(Grade $grade){
        return Grade::showStudentsInGrade($grade);
    }
}
