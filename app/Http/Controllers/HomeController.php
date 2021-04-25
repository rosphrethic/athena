<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyData;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getCompanyData()
    {
        return CompanyData::find(1);
    }
}
