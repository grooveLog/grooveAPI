<?php

namespace App\Http\Controllers;

use App\UniversalGoal;
use Illuminate\Http\Request;


class UniversalGoalController extends Controller
{

    public function getAllUniversalGoals()
    {
        return response()->json(UniversalGoal::all());
    }

    public function getOneUniversalGoal($id)
    {
        return response()->json(UniversalGoal::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:255',
            'privacy' => 'required|alpha_dash|max:12',
            'endorsed' => '',
            'status' => 'required',
        ]);

        $universalGroove = UniversalGoal::create($request->all());

        return response()->json($universalGroove, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:255',
            'privacy' => 'required|alpha_dash|max:12',
            'endorsed' => '',
            'status' => 'required',
        ]);

        $universalGroove = UniversalGoal::findOrFail($id);
        $universalGroove->update($request->all());

        return response()->json($universalGroove, 200);
    }

    public function delete($id)
    {
        UniversalGoal::findOrFail($id)->delete();
        return response('Successfully Deleted Universal Groove', 200);
    }

}

