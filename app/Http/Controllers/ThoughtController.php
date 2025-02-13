<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thought;
use App\Models\User;



class ThoughtController extends Controller
{
    //Show every thought
    public function index()
    {
    return view('cloud',['thoughts' => Thought::with('user')->orderBy('position', 'desc')->simplePaginate(6)]);
    }

    //Store a new thought
    public function store(request $request)
    {
        $formFields = $request->validate([
            'thought'=>'required',
            
        ]);
        $formFields['user_id'] = Auth::id();
        $thought=Thought::create($formFields);
        $thought->position = $thought->id;
        $thought->save(); 
        return redirect('/cloud');
    }


    //Make the thought go up or down
    public function update(Request $request)
    {
        $id = $request->route('id');
        $thoughtClicked = Thought::findOrFail($id);
    
        if ($request->input('direction') === 'up') {
            //If found a thought above the thought clicked , store the first one on thoughtAbove
            $thoughtAbove = Thought::where('position', '>', $thoughtClicked->position)
            ->orderBy('position', 'asc')
            ->first();

        if ($thoughtAbove) {
            $tempPosition = $thoughtClicked->position;
            $thoughtClicked->position = $thoughtAbove->position;
            $thoughtAbove->position = $tempPosition;

            $thoughtClicked->save();
            $thoughtAbove->save();
            }
            } 
        else if ($request->input('direction') === 'down') {
            $thoughtBelow = Thought::where('position', '<', $thoughtClicked->position)
            ->orderBy('position', 'desc')
            ->first();

        if ($thoughtBelow) {
            $tempPosition = $thoughtClicked->position;
            $thoughtClicked->position = $thoughtBelow->position;
            $thoughtBelow->position = $tempPosition;
            

            $thoughtClicked->save();
            $thoughtBelow->save();
             }
        }

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
