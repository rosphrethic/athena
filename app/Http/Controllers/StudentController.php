<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Nationality;
use Auth;

class StudentController extends Controller
{
   public function index()
   {
      return view('foundations.documentaries.students.index');
   }

   public function getAll()
   {
      return Student::orderBy('name')->get();
   }

   public function getOne(Request $request)
   {
      return Student::with('guardian')->where('id', $request->id)->first();
   }

   public function store(Request $request, Student $student)
   {
      $this->validateData($request, $student);

      $student->guardian_id = $request->guardian_id;
      $student->name = $request->name;
      $student->lastname = $request->lastname;
      $student->document_type = $request->document_type;
      $student->document_number = $request->document_number;
      $student->nationality_id = $request->nationality_id;
      $student->birth_date = $request->birth_date;
      $student->sex = $request->sex;

      $student->save();

      return 200;
   }

   public function update(Request $request)
   {
      $student = Student::find($request->id);

      $this->validateData($request, $student);

      $student->guardian_id = $request->guardian_id;
      $student->name = $request->name;
      $student->lastname = $request->lastname;
      $student->document_type = $request->document_type;
      $student->document_number = $request->document_number;
      $student->nationality_id = $request->nationality_id;
      $student->birth_date = $request->birth_date;
      $student->sex = $request->sex;

      $student->save();

      return 200;
   }

   public function destroy(Request $request)
   {
      $student = Student::find($request->id);

      if (count($student->nationality) == 0
         || count($student->guardian) == 0
         || count($student->course) == 0) {
            $student->delete();
      } else {
            abort(500);
      }
   }

   public function validateData($request, $student)
   {
      $validatedData = $request->validate([
         'guardian_id' => [
            'required',
         ],
         'name' => [
            'required',
            'between:1,255',
            'regex:/^[\pL\s\-]+$/u',
         ],
         'lastname' => [
            'required',
            'between:1,255',
            'regex:/^[\pL\s\-]+$/u',
         ],
         'document_type' => [
            'required',
         ],
         'document_number' => [
            'required',
            'between:1,255',
            Rule::unique('students')->ignore($student)->whereNull('deleted_at')
         ],
         'nationality_id' => [
            'required',
         ],
         'birth_date' => [
            'required',
            'date'
         ],
         'sex' => [
            'required',
         ],
      ]);
   }
}
