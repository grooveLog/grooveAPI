<?php

namespace App\Http\Controllers;

use App\Groove;
use Illuminate\Http\Request;


class GrooveController extends Controller
{

    public function getAllGrooves()
    {
        return response()->json(Groove::all());
    }

    public function getOneGroove($id)
    {
        return response()->json(Groove::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'universal_goal_id' => 'required|integer',
            'personal_description' => 'alpha_dash|max:255',
            'commitment' => 'integer',
            'volume_amount' => 'integer',
            'volume_measurement' => 'integer',
            'volume_prefix' => 'alpha_dash|max:12',
            'frequency_number' => 'integer',
            'frequency_period' => 'alpha_dash|max:16',
            'status' => 'required|alpha_dash|max:12',
        ]);

        $groove = Groove::create($request->all());

        return response()->json($groove, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'universal_goal_id' => 'required|integer',
            'personal_description' => 'alpha_dash|max:255',
            'commitment' => 'integer',
            'volume_amount' => 'integer',
            'volume_measurement' => 'integer',
            'volume_prefix' => 'alpha_dash|max:12',
            'frequency_number' => 'integer',
            'frequency_period' => 'alpha_dash|max:16',
            'status' => 'required|alpha_dash|max:12',
        ]);

        $groove = Groove::findOrFail($id);
        $groove->update($request->all());

        return response()->json($groove, 200);
    }

    public function delete($id)
    {
        Groove::findOrFail($id)->delete();
        return response('Successfully Deleted Groove', 200);
    }

}