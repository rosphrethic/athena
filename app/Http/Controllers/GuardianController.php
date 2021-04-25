<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\City;
use Auth;

class GuardianController extends Controller
{
   public function index()
   {
      return view('foundations.documentaries.guardians.index');
   }

   public function getAll()
   {
      return Guardian::orderBy('name')->get();
   }

   public function getOne(Request $request)
   {
      return Guardian::with('student')->where('id', $request->id)->orderBy('name')->first();
   }

   public function store(Request $request, Guardian $guardian)
   {
      $this->validateData($request, $guardian);

      $guardian->name = $request->name;
      $guardian->lastname = $request->lastname;
      $guardian->document_type = $request->document_type;
      $guardian->document_number = $request->document_number;
      $guardian->city_id = $request->city_id;
      $guardian->address = $request->address;
      $guardian->telephone = $request->telephone;

      $guardian->save();

      return 200;
   }

   public function update(Request $request)
   {
      $guardian = Guardian::find($request->id);

      $this->validateData($request, $guardian);

      $guardian->name = $request->name;
      $guardian->lastname = $request->lastname;
      $guardian->document_type = $request->document_type;
      $guardian->document_number = $request->document_number;
      $guardian->city_id = $request->city_id;
      $guardian->address = $request->address;
      $guardian->telephone = $request->telephone;

      $guardian->save();

      return 200;
   }

   public function destroy(Request $request)
   {
      $guardian = Guardian::find($request->id);
              
      if (count($guardian->student) == 0
         || count($guardian->city == 0)) {
            $guardian->delete();
      } else {
            abort(500);
      }
   }

   public function validateData($request, $guardian)
   {
      $validator = $request->validate([
         'name' => [
            'required',
            'between:1,255',
            'regex:/^[\pL\s\-]+$/u',
         ],
         'lastname' => [
            'required',
            'between:1,255',
         ],
         'document_type' => [
            'required',
         ],
         'document_number' => [
            'required',
            'between:1,255',
            Rule::unique('guardians')->ignore($guardian)->whereNull('deleted_at')
         ],
         'city_id' => [
            'required',
         ],
         'address' => [
            'required',
            'between:1,255',
         ],
         'telephone' => [
            'required',
            'between:1,255',
         ],
      ]);
   }
}
