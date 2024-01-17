<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Training;

use App\Models\Trainer;

use App\Models\Department; //add Departments Model

class TrainerController extends Controller
{
    public function trainer(Request $request)
    {
        $departmentData['data'] = Department::orderby("name", "desc")
            ->select('id', 'name')
            ->get();
    
        $trainingsQuery = Trainer::selectRaw('MIN(trainers.id) as id, trainers.name, MIN(trainers.status) as status, MIN(departments.name) as departments_name')
            ->leftJoin('departments', 'trainers.department', '=', 'departments.id')
            ->groupBy('trainers.name');
    
        if ($request->get('keyword') != null) {
            // search based on keyword
            $keyword = $request->get('keyword');
            $trainingsQuery->where('trainers.name', 'LIKE', '%' . $keyword . '%');
        }
    
        if ($request->has('status')) {
            $status = $request->get('status');
            $trainingsQuery->where('trainers.status', '=', $status);
        }
    
        if ($request->get('department')) {
            $department = $request->get('department');
            $trainingsQuery->where('trainers.department', '=', $department);
        }
    
        $trainings = $trainingsQuery->paginate(5);
    
        return view('trainers.trainer')->with(compact('trainings', 'departmentData'));
    }
    
    public function create()
    {
        // Fetch departments
        $departmentData['data'] = Department::orderby("name","desc")
           ->select('id','name')
           ->get();

        // display form create
        return view('trainers.create')->with("departmentData",$departmentData);; // create.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email',
            // 'mobile_number' => 'required|string|max:20',
            // 'gender' => 'required|in:male,female',
            // 'sel_depart' => 'required|exists:departments,id',
            // 'address' => 'required|string|max:255',
        ]);
        // Method 1
        $trainer = new Trainer;
        $trainer->name = $request->input('name');
        $trainer->email = $request->input('email');
        $trainer->mobile_number = $request->input('mobile_number');
        $trainer->gender = $request->input('gender');
        $trainer->status = 'active'; // Set the default status to 'active'
        $trainer->department = $request->get('sel_depart');

        $trainer->address = $request->input('address');

        // save record
        $trainer->save();

        // redirect to index
        return redirect('/trainers')->with('success', 'Trainer record has been inserted successfully!');;

    }

    public function detail($id)
    {
        $training = Trainer::selectRaw(
            'MIN(trainers.id) as id, 
            MIN(trainers.name) as name, 
            MIN(trainers.email) as email, 
            MIN(trainers.mobile_number) as mobile_number, 
            MIN(trainers.gender) as gender, 
            MIN(trainers.status) as status, 
            MIN(trainers.address) as address,  
            MIN(departments.name) as departments_name')
            
            ->leftJoin('departments', 'trainers.department', '=', 'departments.id')
            ->where('trainers.id', '=', $id)
            ->groupBy('trainers.id') // Group by trainer ID
            ->first(); // Use first() instead of paginate() to get a single result
    
        return view('trainers.detail')->with(compact('training'));
    }

    public function edit( $id)
    {
        $training = Trainer::find($id);
        $departmentData['data'] = Department::orderby("name","desc")
        ->select('id','name')
        ->get();

        $department = Department::find($training->department);
        
        return view ('trainers.edit')->with(compact('training', 'departmentData', 'department')); // call form edit
    }

    public function update(Request $request, $id)
    {
        // Save edited record
        $training = Trainer::find($id);
    
        // Request: data yang dihantar
        $training->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile_number' => $request->input('mobile_number'),
            'department' => $request->input('department'), // Use 'department' here
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'status' => $request->input('status'),
        ]);
    
        return redirect('/trainers')->with('success', 'Trainer record has been updated!');
    }

    // Delete / Remove
    public function delete( $id) // delete/destroy
    {
        // delete record based on id
        $training=Trainer::find($id);
        $training->delete();
        return redirect('/trainers')->with('success', "Record ID: $id has been deleted.");
    }
    
}
