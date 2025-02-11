<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thought; 

class ThoughtController extends Controller
{
    //Show every Thought
    public function index()
    {
        return view('cloud',['thoughts'=>Thought::latest()->simplePaginate(2)]);
    }

    //Store the input data
    public function store(request $request)
    {
        $formsFields = $request->validate([
            'thought'=>'required'
        ]);
        Thought::create($formsFields);
        return redirect('/cloud');
    }
}
