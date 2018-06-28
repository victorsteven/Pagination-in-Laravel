<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sex;
use DB;
use Validator;
use App\Student;

class StudentController extends Controller
{
    public function index(){
        $student = Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
                        ->selectRaw('sexes.sex,
                                    students.first_name,
                                    students.last_name,
                                    CONCAT(students.first_name, " ", students.last_name) AS full_name, students.id'
                                    )
                                    ->get();
        return view('students.index', compact('students'));
    }
    public function insert(){
        return view('students.insert', ['sexes'=>Sex::all()]);
    }
    public function save(Request $request){
        
    }
}
