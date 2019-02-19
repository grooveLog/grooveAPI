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
        return response()->json(
            Goal::findOrFail($id)
                ->leftJoin('universal_goals as ug', 'ug.id', '=', 'goals.universal_goal_id')
                ->where('goals.id', $id)
                ->select('goals.*', 'ug.*', 'goals.id AS id')
                ->with('visions')
                ->first()
        );
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'universal_goal_id' => 'required|integer',
            'personal_description' => 'max:255',
            'progress' => 'integer',
            'reward' => 'integer',
            'goal_date_from' => '',
            'goal_date_to' => '',
            'status' => 'required|alpha_dash|max:12',
            'visions' => ''
        ]);

        $goal = Goal::create($request->all());
        $goal->visions()->saveMany($request->get('visions'));

        return response()->json($goal, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'universal_goal_id' => 'required|integer',
            'personal_description' => 'max:255',
            'progress' => 'integer',
            'reward' => 'integer',
            'goal_date_from' => '',
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