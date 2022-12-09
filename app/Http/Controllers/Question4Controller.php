<?php

namespace App\Http\Controllers;

use App\Models\Question4;
use Illuminate\Http\Request;

class Question4Controller extends Controller
{
    public function create()
    {
        return view('questions.4');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foo' => 'required|max:55',
            'bar' => 'required|date',
            'baz' => 'required|min:8|max:24',
            'qux' => 'required|boolean',
        ]);

        Question4::create($request->all());

        return redirect()->route('question.4.create')->with('success', 'Created successfully.');
    }
}
