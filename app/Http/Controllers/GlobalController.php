<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nationality;
use App\Models\City;
use App\Models\Grade;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Section;
use App\Models\Baccalaureate;
use App\Models\Requirement;
use App\Models\Guardian;
use App\Models\CompanyData;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Habilitation;

class GlobalController extends Controller
{
    public function getAllNationalities()
    {
        return Nationality::where('status', 'Activo')->orderBy('name')->get();
    }

    public function getAllCities()
    {
        return City::where('status', 'Activo')->orderBy('name')->get();
    }

    public function getAllBranches()
    {
        return Branch::orderBy('name')->get();
    }

    public function getAllGrades()
    {
        return Grade::orderBy('name')->get();
    }

    public function getAllBaccalaureates()
    {
        return Baccalaureate::orderBy('name')->get();
    }

    public function getAllSections()
    {
        return Section::orderBy('name')->get();
    }

    public function getAllGuardians()
    {
        return Guardian::orderBy('name')->get();
    }

    public function getAllRequirements()
    {
        return Requirement::orderBy('name')->get();
    }

    public function getAllYears()
    {
        return Course::distinct()->select('year')->where('branch_id', session('branch_id'))->orderBy('year', 'desc')->get();
    }

    public function getAllCompanyData()
    {
        return CompanyData::find(1);
    }

    public function getAllRoles()
    {
        return Role::where('status', 'Activo')->orderBy('name')->get();
    }

    public function getAllCourses()
    {
        return Course::with('grade', 'section', 'baccalaureate')->where('status', 'Activo')->get();
    }
}
