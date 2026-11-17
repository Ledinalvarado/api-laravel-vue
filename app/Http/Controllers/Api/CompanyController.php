<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;

class CompanyController extends Controller
{










    // 1. Obtener empresas con todos sus proyectos
    public function companiesWithProjects()
    {
        $companies = Company::with('projects')->get();

        return response()->json($companies);
    }

    // 2. Obtener empresas con la cantidad de proyectos
    public function companiesWithProjectCount()
    {
        $companies = Company::withCount('projects')->get();

        return response()->json($companies);
    }

    // 3. Obtener empresas que no tienen proyectos
    public function companiesWithoutProjects()
    {
        $companies = Company::doesntHave('projects')->get();

        return response()->json($companies);
    }

    // 5. Obtener proyectos con información de su empresa
    public function projectsWithCompany()
    {
        $projects = Project::with('company')->get();

        return response()->json($projects);
    }



}
