<?php

namespace App\Http\Controllers;

use App\VisionTimescale;
use Illuminate\Http\Request;


class VisionTimescaleController extends Controller
{

    public function getAllVisionTimescales()
    {
        return response()->json(VisionTimescale::all());
    }

    public function getOneVisionTimescale($id)
    {
        return response()->json(VisionTimescale::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|alpha_dash',
            'numeric' => 'required|integer',
        ]);

        $visionTimescale = VisionTimescale::create($request->all());

        return response()->json($visionTimescale, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'text' => 'required|alpha_dash',
            'numeric' => 'required|integer'
        ]);

        $visionTimescale = VisionTimescale::findOrFail($id);
        $visionTimescale->update($request->all());

        return response()->json($visionTimescale, 200);
    }

    public function delete($id)
    {
        VisionTimescale::findOrFail($id)->delete();
        return response('Successfully Deleted VisionTimescale', 200);
    }


}
