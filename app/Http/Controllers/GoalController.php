<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;


class GoalController extends Controller
{

    public function getAllGoals()
    {
        return response()->json(Goal::all());
    }

    public function getOneGoal($id)
    {
        return response()->json(Goal::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'universal_goal_id' => 'required|integer',
            'personal_description' => 'alpha_dash|max:255',
            'progress' => 'integer',
            'reward' => 'integer',
            'goal_from_date' => '',
            'goal_date_to' => '',
            'status' => 'required|alpha_dash|max:12',
        ]);

        $goal = Goal::create($request->all());

        return response()->json($goal, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'universal_goal_id' => 'required|integer',
            'personal_description' => 'alpha_dash|max:255',
            'progress' => 'integer',
            'reward' => 'integer',
            'goal_from_date' => '',
            'goal_date_to' => '',
            'status' => 'required|alpha_dash|max:12',
            'completed_at' => ''
        ]);

        $goal = Goal::findOrFail($id);
        $goal->update($request->all());

        return response()->json($goal, 200);
    }

    public function delete($id)
    {
        Goal::findOrFail($id)->delete();
        return response('Successfully Deleted Goal', 200);
    }
    
}