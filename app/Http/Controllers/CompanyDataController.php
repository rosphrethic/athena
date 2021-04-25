<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyData;
use Auth;

class CompanyDataController extends Controller
{
    public function index()
    {
        return view('system.companies-data.index');
    }

    public function getOne()
    {
        return CompanyData::find(1);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
            ],
            'name_administration' => [
                'required',
            ],
            'slogan' => [
                'required',
            ],
            'founder' => [
                'required',
                'regex:/^[\pL\s\-]+$/u'
            ],
            'foundation_date' => [
                'required',
            ],
        ]);

        $company_data = CompanyData::find(1);

        $company_data->name = $request->name;
        $company_data->name_administration = $request->name_administration;
        $company_data->slogan = $request->slogan;
        $company_data->founder = $request->founder;
        $company_data->foundation_date = $request->foundation_date;

        if ($request->emblem) {
            $validatedData = $request->validate([
                'emblem' => [
                    'mimes:jpg,jpeg,png,svg',
                    'max:2000',
                ]
            ]);

            // Consigue el nombre y la extension del archivo
            $file_name = 'emblem.';

            $file_extension = $request->emblem->getClientOriginalExtension();

            $file_path = $request->file('emblem')->storeAs('public/emblem', ($file_name . $file_extension));

            // Ruta del archivo que se guarda en la base de datos
            $file_path_db = 'emblem.' . $file_extension;

            $company_data->emblem = $file_path_db;
        }

        $company_data->save();

        return 200;
    }
}
