<?php

namespace App\Http\Controllers;

use App\Vision;
use Illuminate\Http\Request;


class VisionController extends Controller
{

    public function getAllVisions()
    {
        return response()->json(Vision::all());
    }

    public function getOneVision($id)
    {
        return response()->json(Vision::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'universal_vision_id' => 'required|integer',
            'personal_description' => 'alpha_dash|max:255',
            'probability' => 'integer',
            'passion' => 'integer',
            'vision_timescales_id' => 'integer',
            'status' => 'required|alpha_dash|max:12'
        ]);

        $vision = Vision::create($request->all());

        return response()->json($vision, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'universal_vision_id' => 'required|integer',
            'personal_description' => 'alpha_dash|max:255',
            'probability' => 'integer',
            'passion' => 'integer',
            'vision_timescales_id' => 'integer',
            'status' => 'required|alpha_dash|max:12',
            'completed_at' => ''
        ]);

        $vision = Vision::findOrFail($id);
        $vision->update($request->all());

        return response()->json($vision, 200);
    }

    public function delete($id)
    {
        Vision::findOrFail($id)->delete();
        return response('Successfully Deleted Vision', 200);
    }


}
