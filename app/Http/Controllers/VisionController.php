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
        return response()->json(
            Vision::findOrFail($id)
                ->leftJoin('universal_visions as uv', 'uv.id', '=', 'visions.universal_vision_id')
                ->where('visions.id', $id)
                ->select('visions.*', 'uv.*', 'visions.id AS id')
                ->first()
        );
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'universal_vision_id' => 'required|integer',
            'personal_description' => 'max:255',
            'probability' => 'integer',
            'passion' => 'integer',
            'vision_timescales' => 'alpha_dash|max:16',
            'status' => 'required|alpha_dash|max:12'
        ]);

        $vision = Vision::create($request->all());

        return response()->json($vision, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'universal_vision_id' => 'required|integer',
            'personal_description' => 'max:255',
            'probability' => 'integer',
            'passion' => 'integer',
            'vision_timescales' => 'alpha_dash|max:16',
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
