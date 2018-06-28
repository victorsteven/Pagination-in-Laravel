<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Sex;
use Validator;

class ValidationController extends Controller
{
    public function insertStudentValidation(){
        $sexes = Sex::all(); 
        return view('ajax.insertStudentValidation', compact('sexes'));
    }

    public function storeData(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
             'sex_id' => 'required'
        ]);
        if($validator->passes()){

            Student::create(['first_name'=>$request->first_name, 
                            'last_name'=>$request->last_name, 
                            'sex_id'=>$request->sex_id]);
            return response()->json(['success'=>'inserted successfully']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
