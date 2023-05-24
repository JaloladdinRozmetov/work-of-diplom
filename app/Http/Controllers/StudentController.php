<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Topic;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::query()->with('topics')->get();

        $topicsCount = Topic::query()->get()->count();


        return view('students.index',compact('students','topicsCount'));

    }
}
