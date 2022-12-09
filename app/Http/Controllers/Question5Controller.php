<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Question5Controller extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('alt') === '1') {
            return view('questions.5b');
        } else {
            return view('questions.5a');
        }
    }
}
