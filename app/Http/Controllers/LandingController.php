<?php

namespace App\Http\Controllers;
use App\Models\Training;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        if($request->get('keyword')!=null){
            // search based on keyword
            $keyword = $request->get('keyword');
            $trainings = Training::where('title', 'LIKE', '%'.$keyword.'%')->paginate(5);
        }
        else{
            // capture all record from table trainings
            $trainings = Training::paginate(5); // SELECT * FROM trainings
        }
        // send to trainings.index
        // trainings = $trainings
        // compact : func php to convert to array. usually double array since banyak record
        return view('trainings.search')->with(compact('trainings')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
     public function show($id)
    {
        $training=Training::find($id);
        return view('trainings.show')->with(compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
