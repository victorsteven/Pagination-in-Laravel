<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Sex; 

class AjaxController extends Controller
{
    public function index(){

        $sexes = Sex::pluck('sex', 'id');

        return view('ajax.index', compact('sexes'));
    }

    public function readData(){
        $students = Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
        ->selectRaw('sexes.sex,
                    students.first_name,
                    students.last_name,
                    CONCAT(students.first_name, " ", students.last_name) AS full_name, students.id'
                    )
                    ->get();
        // return response($students);

        return view('ajax.studentList', compact('students'));
    }

    public function store(Request $request){
        if($request->ajax()){
            $student = Student::create($request->all());
            
            // return response($student);
            return response($this->find($student->id));
            // return response($request->all());
        }
    }

    public function find($id){
        return Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
        ->selectRaw('sexes.sex,
                    students.sex_id,
                    students.first_name,
                    students.last_name,
                    CONCAT(students.first_name, " ", students.last_name) AS full_name, students.id')
                    ->where('students.id', $id)->first();

    }

    public function destroy(Request $request){
        if($request->ajax()){
            Student::destroy($request->id);
            return response(['message'=>'Student deleted']);
        }
    }

    public function edit(Request $request){
        if($request->ajax()){
            $student = Student::find($request->id);
            // $student->update($request->all());
            return response($student);
        }
    }

    public function update(Request $request){
        if($request->ajax()){
            $student = Student::find($request->id);
            $student->update($request->all());
            // return response($request->all());
            return response($this->find($student->id));
        }
    }

    public function findPage(){
        return Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
        ->selectRaw('sexes.sex,
                    students.sex_id,
                    students.first_name,
                    students.last_name,
                    CONCAT(students.first_name, " ", students.last_name) AS full_name, students.id')
                    // ->where('students.id', $id)
                    ->paginate(2);

    }
    public function pagination(){
        $students = $this->findPage();

        return view('ajax.pagination', compact('students'));
    }

    public function studentPage(){
        $students = $this->findPage();

        return view('ajax.studentPage', compact('students'))->render();
    }
    

}
 