<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thought;
use App\Models\thought as ModelsThought;
use PhpParser\Node\Expr\FuncCall;

class ThoughtController extends Controller
{
    //Show every thought
    public function index()
    {
    return view('cloud',['thoughts'=>Thought::orderby('position','desc')->simplePaginate(6)]);
    }

    //Store a new thought
    public function store(request $request)
    {
        $formsFields = $request->validate([
            'thought'=>'required'
        ]);

        $thought=Thought::create($formsFields);
        $thought->position = $thought->id;
        $thought->save(); 
        return redirect('/cloud');
    }


    //Make the thought go up or down
    public function update(Request $request)
    {
    
        $id=$request->route('id');
        $thoughtClicked=Thought::findOrFail($id);
        if($request->input('direction')==='up'){
            //If found a thought above the thought clicked , store the first one on thoughtAbove
            $thoughtAbove = Thought::where('position','=',$thoughtClicked->position + 1)->first();

            if($thoughtAbove){
                $thoughtClicked->position++;
                $thoughtAbove->position--;  
                $thoughtClicked->save();
                $thoughtAbove->save();    
            }
           
        }        
        else if($request->input('direction')==='down'){
            $thoughtBelow=Thought::where('position','=',$thoughtClicked->position-1)->first();

            if($thoughtBelow){
                $thoughtClicked->position--;
                $thoughtBelow->position++;
                $thoughtClicked->save();
                $thoughtBelow->save();
            }
            
        };

        return redirect('/cloud');
    }



    //Destroy thought
    public function destroy(Request $request)
    {
        $id= $request->route('id');
        $thought=Thought::findOrFail($id);
        $thought->delete();
        return redirect('/cloud');
       
    }
}
