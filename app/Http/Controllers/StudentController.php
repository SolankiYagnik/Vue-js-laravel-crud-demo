<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request) {
        return Student::create($request->all());
    }

    public function show($id) {
        return Student::find($id);
    }

    public function update(Request $request, $id) {
        $student = Student::find($id);
        $student->update($request->all());
        return $student;
    }

    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();
        return $student;
    }
}
