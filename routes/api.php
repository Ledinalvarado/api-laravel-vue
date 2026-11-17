<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('students', [StudentController::class, 'index']);
//Route::post('students', [StudentController::class, 'store']);
//Route::get('enrollments', [StudentController::class, 'enrollments']);
Route::get('enrollments', [StudentController::class, 'withEnrollments']);
Route::get('faculty-with-students', [FacultyController::class, 'withStudents']);
Route::get('enrollments/students', [\App\Http\Controllers\Api\EnrollmentController::class, 'withStudents']);

Route::get('students/students-by-faculty/{id}',[StudentController::class,'studentsByFaculty']);


Route::get('students/student-with-faculty/{id}',[StudentController::class,'studentWithFaculty']);

Route::get('faculty/students-count', [FacultyController::class, 'facultiesWithStudentCount']);



Route::get('students/students-with-faculties', [StudentController::class, 'studentsWithFaculties']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::post('/students', [StudentController::class, 'store']);

Route::get('faculties/withoutStudents', [FacultyController::class, 'facultiesWithoutStudents']);

//////////para prueba

Route::get('/companies/projects', [CompanyController::class, 'companiesWithProjects']);

Route::get('/companies/projects/count', [CompanyController::class, 'companiesWithProjectCount']);

Route::get('/companies/without-projects', [CompanyController::class, 'companiesWithoutProjects']);

//Route::get('/companies/active-with-projects', [CompanyController::class, 'activeCompaniesWithActiveProjects']);

Route::get('/projects/companies', [CompanyController::class, 'projectsWithCompany']);


/////////
Route::get('/students/search/{name}', [StudentController::class, 'searchStudents']);
Route::get('students/count-by-faculty/{faculty}',[StudentController::class,'studentsCountByFaculty']);
//Route::get('/student/byDate/{date}',[StudentController::class,'studentsByDate']);
Route::get('/student/byDate/',[StudentController::class,'studentByDate']);
