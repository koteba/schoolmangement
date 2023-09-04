<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Teacher;
use App\Models\Advertisement;

class IndexController extends Controller
{
    public function index()
    {
        $advertisements=Advertisement::all();
        $questions=Question::all();
        $teachers=Teacher::all();
        return view('index')->with('questions',$questions)->with('teachers',$teachers)->with('advertisements',$advertisements);
    }
}
