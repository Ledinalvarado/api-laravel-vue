<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    //


  



    public function facultiesWithoutStudents(Request $request){
        $faculties = Faculty::doesntHave('students')->get();
        return response()->json($faculties);
    }



    public function facultiesWithStudentCount()
    {
        $faculties = Faculty::withCount('students')->get();

        return response()->json($faculties);
    }


    public function withStudents()
    {
        //with() / acceder a la informacion de otra tabla mediante la relacion
        $faculty = Faculty::with('students')->get();
        return response()->json($faculty);
    }
}
