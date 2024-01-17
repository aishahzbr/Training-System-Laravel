<?php

namespace App\Http\Controllers;

use App\Models\Training;

use App\Models\Trainer;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Create an instance of TrainingController
        $trainingController = new TrainingController();

        // Get distinct trainers from the trainings table (active)
        $trainings = Trainer::selectRaw('MIN(id) as id, name')
        ->where('status', 'active') // Add this line to filter by 'active' status
        ->groupBy('name')
        ->paginate(5);

        // Get inactive trainers list
        $trainingsInactive = Trainer::selectRaw('MIN(id) as id, name')
        ->where('status', 'inactive') // Add this line to filter by 'active' status
        ->groupBy('name')
        ->paginate(5);

        // Get software (active) trainers list
        $softwareTrainers = Trainer::selectRaw('MIN(id) as id, name')
        ->where('department', '1')
        ->where('status', 'active') // Add this line to filter by 'active' status
        ->groupBy('name')
        ->paginate(5);

        // Get multimedia (active) trainers list
        $multimediaTrainers = Trainer::selectRaw('MIN(id) as id, name')
        ->where('department', '2')
        ->where('status', 'active') // Add this line to filter by 'active' status
        ->groupBy('name')
        ->paginate(5);

        // Get multimedia (active) trainers list
        $cyberTrainers = Trainer::selectRaw('MIN(id) as id, name')
        ->where('department', '3')
        ->where('status', 'active') // Add this line to filter by 'active' status
        ->groupBy('name')
        ->paginate(5);

        
        // Get multimedia (active) trainers list
        $networkTrainers = Trainer::selectRaw('MIN(id) as id, name')
        ->where('department', '4')
        ->where('status', 'active') // Add this line to filter by 'active' status
        ->groupBy('name')
        ->paginate(5);

        // Get list of trainers
        // Group the results by the trainer column
         // Get distinct trainers from the trainings table

        // Get the total training count
        $totalTrainingCount = $trainingController->getTotalTrainingCount();
        
        // Count the total number of unique trainers
        $totalTrainerCount = Trainer::distinct('name')->count();

        // Count the total number of active trainers
        $totalActiveTrainer = Trainer::where('status', 'active')->distinct('name')->count();

        // Count the total number of active trainers
        $totalInactiveTrainer = Trainer::where('status', 'inactive')->distinct('name')->count();

        // Count the total number of trainers for each department
        $totalTrainersByDepartment = Trainer::select('department', Trainer::raw('COUNT(*) as total'))
        ->where('status', 'active') // Add this line to filter by 'active' status
        ->groupBy('department')
        ->get();

        // Create separate variables for each department's trainer count
        $deptCounts = [];
        foreach ($totalTrainersByDepartment as $count) {
            $deptCounts['department' . $count->department] = $count->total;
        }
    
        // Pass both counts to the dashboard view
        return view('home', with(compact(
            'trainings',
            'trainingsInactive',
            'softwareTrainers',
            'multimediaTrainers',
            'cyberTrainers',
            'networkTrainers',
            'totalTrainingCount', 
            'totalTrainerCount', 
            'totalActiveTrainer', 
            'totalInactiveTrainer',
            'totalTrainersByDepartment',
            'deptCounts')));
    }

    public function trainerhome(){
        return view('trainerhome');
    }
    
}
