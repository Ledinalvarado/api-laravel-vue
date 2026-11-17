<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{







    public function studentByDate(){

//        $students=Student::whereDate('created_at',$date)->get();
//        $students=Student::whereDate('created_at','<',$date)->get();
//        $students=Student::whereBetween('created_at',['2008-11-11','2016-12-12'])->get();
        $students=Student::whereBetween('semester',['2','4'])->get();
        return response()->json($students);
    }



    public function studentsByDate($date)
    {
        $students = Student::whereDate('created_at', $date)->get();
        return response()->json($students);

    }

    public function searchStudents($nombre)
    {
        $students = Student::where('name', 'LIKE', '%'.$nombre.'%')->get();

        return response()->json($students);
    }











    //EJERCICIOS EN CLASE
    //FILTRAR ESTUDIANTES POR SEMESTRE [Ej:Si se usa el semestre 3 , deben devolverse todos los estudiantes que esten en ese semestre]
    //BUSCAR Y MOSTRAR UN REGISTRO DE ESTUDIANTE USANDO EL CAMPO [student_code] "usar where::"
    //DEVOLVER TODOS LOS ESTUDIANTES QUE ESTAN ACTIVOS "usar where::"
    //TENER LISTA LOS 3 ENDPOINTS EN POSTMAN PARA SU REVISIÓN EN CLASE


//    public function index()
//    {
//        $students = Student::all();
//        return response()->json($students);
//    }











        public function studentsByFaculty($id){
            $students = Student::with('faculty:id,name')->where('faculty_id', $id)->get();
            return response()->json([$students]);
        }









//    public function studentsByFaculty($id)
//    {
//        $students = Student::with('faculty:id,name')
//            ->where('faculty_id', $id)
////            ->where('faculty_id', 1)
//            ->get();
//
//        return response()->json($students);
//    }


    public function studentWithFaculty($id){
            $student = Student::with('faculty:id,name')->findOrFail($id);
            return response()->json($student);
    }





//
//    public function studentWithFaculty($id)
//    {
//        $student = Student::with('faculty:id,name,description')
//            ->findOrFail($id);
//
//        return response()->json($student);
//    }


    public function enrollments(Student $student)
    {
        $student->load('enrollments');

        return response()->json($student);
    }


    public function studentsWithFaculties()
    {
        $studentsWithFaculties = Student::with('faculty')->get();
        return response()->json($studentsWithFaculties);

    }

    public function withEnrollments()
    {
        //with() / acceder a la informacion de otra tabla mediante la relacion
        $students = Student::with('enrollments')->get();
        return response()->json($students);
    }

    public function index(){

        $students = Student::all();
        return response()->json($students);
    }






    public function store(Request $request){

        $request->validate([
            'student_code' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'semester' => 'required|integer|min:1|max:12',
            'status' => 'required|in:active,inactive',
        ]);

        $student = Student::create($request->all());
        return response()->json($student,201);

    }

    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message_error' => 'Estudiante no encontrado'
            ], 404);
        }

        return response()->json($student);
    }

}
