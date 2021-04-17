<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyData;
use App\Models\Baccalaureate;
use App\Models\Section;
use App\Models\Area;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Cause;
use App\Models\Nationality;
use App\Models\City;
use App\Models\Student;
use App\Models\Guardian;
use DB;
use PDF;
use Storage;

class ReportFoundationController extends Controller
{
    public function index()
    {
        return view('reports.foundations.index');
    }

    public function generatePDF(Request $request)
    {
        // Convert inputs
        $table = $request->table;
        $document_type = $request->document_type;
        $nationality_id = $request->nationality_id;
        $city_id = $request->city_id;
        $sex = $request->sex;

        $created_at_from =  ($request->created_at_from) ? $request->created_at_from : '0000-01-01';
        $created_at_to =  ($request->created_at_to) ? $request->created_at_to : '9999-12-12';
        $created_at = [$created_at_from, $created_at_to];

        $birth_date_from =  ($request->birth_date_from) ? $request->birth_date_from : '0000-01-01';
        $birth_date_to =  ($request->birth_date_to) ? $request->birth_date_to : '9999-12-12';
        $birth_date = [$birth_date_from, $birth_date_to];

        // Today's date and Company Data
        $now = date('Y_m_d_h_i_s');
        $company_data = CompanyData::find(1);
        $company_data_emblem_base64 = base64_encode(Storage::get('/public/emblem/' . $company_data->emblem));
        $data = '';
        $columns = $request->columns;

        // Validar fechas
        if ($created_at[0] != null && $created_at[1] == null) {
            return 500;
        } elseif ($created_at[0] == null && $created_at[1] != null) {
            return 500;
        }

        if ($birth_date[0] != null && $birth_date[1] == null) {
            return 500;
        } elseif ($birth_date[0] == null && $birth_date[1] != null) {
            return 500;
        }

        // Get data

        switch ($table) {
            case 'baccalaureatesh':
                $data = Baccalaureate::all();

                break;
            case 'sections':
                $data = Section::all();

                break;

            case 'areas':
                $data = Area::all();

                break;

            case 'subjects':
                $data = Subject::all();

                break;

            case 'grades':
                $data = Grade::all();

                break;

            case 'causes':
                $data = Cause::all();

                break;

            case 'nationalities':
                $data = Nationality::all();

                break;

            case 'cities':
                $data = City::all();

                break;

            case 'students':
                $data = Student::join('guardians', 'guardians.id', '=', 'students.guardian_id')
                    ->join('nationalities', 'nationalities.id', '=', 'students.nationality_id')
                    ->when($created_at, function ($query, $created_at) {
                        return $query->whereBetween('students.created_at', [$created_at[0], $created_at[1]]);
                    })
                    ->when($document_type, function ($query, $document_type) {
                        return $query->where('students.document_type', $document_type);
                    })
                    ->when($nationality_id, function ($query, $nationality_id) {
                        return $query->where('nationalities.id', $nationality_id);
                    })
                    ->when($birth_date, function ($query, $birth_date) {
                        return $query->whereBetween('birth_date', [$birth_date[0], $birth_date[1]]);
                    })
                    ->when($sex, function ($query, $sex) {
                        return $query->where('students.sex', $sex);
                    })
                    ->get([
                        'students.*',
                        'guardians.name as guardian_name',
                        'guardians.lastname as guardian_lastname',
                        'nationalities.name as nationality_name',
                    ]);
                break;

            case 'guardians':
                $data = Guardian::join('cities', 'cities.id', '=', 'guardians.city_id')
                    ->when($created_at, function ($query, $created_at) {
                        return $query->whereBetween('guardians.created_at', [$created_at[0], $created_at[1]]);
                    })
                    ->when($document_type, function ($query, $document_type) {
                        return $query->where('guardians.document_type', $document_type);
                    })
                    ->when($city_id, function ($query, $city_id) {
                        return $query->where('cities.id', $city_id);
                    })
                    ->get([
                        'guardians.*',
                        'cities.name as city_name',
                    ]);
                break;

            default:
                break;
        }

        $data = compact('table', 'data', 'company_data', 'company_data_emblem_base64', 'columns');

        $pdf = PDF::loadView('reports/foundations/pdf', $data)->setPaper($request->size, $request->orientation);

        Storage::disk('local')->put('/reports/foundations/' . $table . '/' . $now . '.pdf', $pdf->output());

        return $pdf->stream($now . '.pdf');
    }

    public function generatePDFs(Request $request)
    {
        $now = date('Y_m_d_h_i_s');
        $table = $request->table;
        $data = DB::table($request->table)->get();
        $company_data = CompanyData::find(1);
        $company_data_emblem_base64 = base64_encode(Storage::get('/public/emblem/' . $company_data->emblem));

        $data = compact('table', 'data', 'company_data', 'company_data_emblem_base64');

        // return view()->share('data',$data);
        $pdf = PDF::loadView('reports/foundations/pdf_view', $data)->setPaper('a4', 'landscape');

        Storage::disk('local')->put('/reports/foundations/' . $table . '/' . $now . '.pdf', $pdf->output());

        return $pdf->stream($now . '.pdf');
    }
}
