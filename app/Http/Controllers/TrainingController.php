<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Department; //add Departments Model
use App\Models\Trainer;


class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
        return view('trainings.index')->with(compact('trainings')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch departments
        $departmentData['data'] = Department::orderby("name","desc")
           ->select('id','name')
           ->get();

 
        // Load index view
        return view('trainings.create')->with("departmentData",$departmentData);
    }

    // Fetch records
    public function getTrainers($departmentid=0){
 
        // Fetch Trainers by DepartmentId
            $trainerData['data'] = Trainer::orderby("name","asc")
            ->select('id','name')
            ->where('department',$departmentid)
            ->where('status', 'active') // Filter by active status
            ->get();
       
            return response()->json($trainerData);
          
    }

    /**
     * Store a newly created resource in storage.
     */
    // $request - data daripada form
    public function store(Request $request)
    {
        // Method 1
        $training = new Training();
        $training -> title = $request->get('title');
        $training -> description = $request->get('description');
        $training->trainer = $request->get('sel_trainer');
        // $training->department = $request->get('sel_department');
        
        // $training -> user_id = Auth::id();

        // start validation
        // image file uploaded?
        if($request->hasFile('attachment')){
            $this->validate ($request, [
                'attachment' => 'mimes:jpeg,jpg,png,bmp|max:2048',
            ],
                // validate error message
                $errors=[
                    'required' => 'The :attribute filed is required.',
                    'mimes' => 'Only jpeg, jpg, png, bmp image file is allowed. File size must not exceed 2MB.'
                ]
            );  // end of validation

            // rename file - minimize redundancy
            // example - filename = 2020-04-06-LaravelTraining101.png
            $filename = date('Y-m-d').'-'.$request->get('title').
            '.'.$request->attachment->
                getClientOriginalExtension();

            // save attached file to storage
            Storage::disk('public')->put($filename, 
            File::get($request->attachment));

            // fetch filename to save to db
            $training->filename=$filename;
        } // end file upload process

        if($request->hasFile('attachmentfile')){
            $this->validate ($request, [
                'attachmentfile' => 'mimes:pdf|max:2048',
            ],
                // validate error message
                $errors=[
                    'required' => 'The :attribute filed is required.',
                    'mimes' => 'Only pdf file is allowed. File size must not exceed 2MB.'
                ]
            );  // end of validation

            // rename file - minimize redundancy
            // example - filename = 2020-04-06-LaravelTraining101.pdf
            $fileupload = date('Y-m-d').'-'.$request->get('title').
            '.'.$request->attachmentfile->
                getClientOriginalExtension();

            // save attached file to storage
            Storage::disk('public')->put($fileupload, 
            File::get($request->attachmentfile));

            // fetch filename to save to db
            $training->fileupload=$fileupload;
        } // end file upload process


        // save record
        $training->save();

        // redirect to index
        return redirect('/trainings')->with('success', 'Training record has been inserted successfully!');;

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
    public function edit( $id)
    {
        $training = Training::find($id);
        return view ('trainings.edit')->with(compact('training')); // call form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // save edited record
        $training = Training::find($id);
        // request: data yang dihantar
        $training->update(
            $request->only(
                'title', 'description', 'trainer'
        ));

        return redirect('/trainings')->with('success', 'Training record has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id) // delete/destroy
    {
        // delete record based on id
        $training=Training::find($id);
        $training->delete();
        return redirect('/trainings')->with('success', "Record ID: $id has been deleted.");
    }

    // Add a new method to get the total count
    public function getTotalTrainingCount()
    {
        $totalTrainingCount = Training::count();

        return $totalTrainingCount;
    }
        
}

