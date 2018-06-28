<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DataTables;

class DatatableController extends Controller
{
    public function index(){

        $students = Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
        ->selectRaw('sexes.sex,
                    students.first_name,
                    students.last_name,
                    CONCAT(students.first_name, " ", students.last_name) AS full_name, students.id'
                    )
                    ->get();
        return view('datatable.index', compact('students'));
    }
}
