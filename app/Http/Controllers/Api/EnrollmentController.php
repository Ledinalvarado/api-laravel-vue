<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function index(){
        $enrollments = Enrollment::all();
        return response()->json($enrollments);
    }


    public function withStudents()
    {
        //with() / acceder a la informacion de otra tabla mediante la relacion
//        $enrollment = Enrollment::with('student')->get();
        $enrollment = Enrollment::with('student:id,name,semester')->get(['enrollments.student_id','enrollments.course_name']);
        return response()->json($enrollment);
    }








//    public function withStudents()
//    {
//        //with() / acceder a la informacion de otra tabla mediante la relacion
//        $enrollments = Enrollment::with('student:id,name,email')->get(['enrollments.student_id','enrollments.id','enrollments.course_name']);
////        $enrollments = Enrollment::with('student:id,name,email')->get();
////        $enrollments = Enrollment::with('student')->get();
//        return response()->json($enrollments);
//    }
}
