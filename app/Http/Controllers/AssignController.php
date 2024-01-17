<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assign;
use App\Models\Training;
use App\Models\Trainer;
use Carbon\Carbon;

class AssignController extends Controller
{
    public function create()
    {
        // Fetch distinct training titles
        // Fetch distinct training titles with their corresponding IDs
        $trainingData['data'] = Training::orderBy("title", "asc")
        ->pluck('title', 'id')
        ->unique();

        // Load index view
        return view('assigns.create')->with("trainingData", $trainingData);
    }


    public function getTrainers($trainingName = '')
    {
        // Get trainers based on the selected training name
        $trainerData['data'] = Training::where('title', $trainingName)
            ->select('id', 'trainer as name')
            ->get();
    
        return response()->json($trainerData);
    }

    public function store(Request $request)
    {
        // Method 1
        $training = new Assign();
        $training -> training_title = $request->get('sel_training');
        $training->trainers_name = $request->get('sel_trainer');
        $training->startdate = $request->get('startdate');
        $training->endate = $request->get('endate');
        // save record
        $training->save();

        // redirect to index
        return redirect('/home')->with('success', 'Assign Trainings Successful!');;

    }

    public function fullcalendar()
    {
        return view('assigns.fullcalendar');

    }

    public function getEvents()
    {
        $schedules = Assign::select('id','training_title', 'trainers_name', 'startdate', 'endate')->get();
        return response()->json($schedules);
    }

    public function deleteEvent($id)
    {
        try {
            $event = Assign::findOrFail($id);
            $event->delete();

            return response()->json(['message' => 'Event deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting event'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $schedule = Assign::findOrFail($id);
    
        $schedule->update([
            'startdate' => Carbon::parse($request->input('startdate'))->format('Y-m-d'),
            'endate' => Carbon::parse($request->input('endate'))->format('Y-m-d'),
        ]);
    
        return response()->json(['message' => 'Event moved successfully']);
    }
    
    
}
