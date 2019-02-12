<?php

namespace App\Http\Controllers;

use App\UniversalVision;
use Illuminate\Http\Request;


class UniversalVisionController extends Controller
{

    public function getAllUniversalVisions()
    {
        return response()->json(UniversalVision::all());
    }

    public function getOneUniversalVision($id)
    {
        return response()->json(UniversalVision::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'privacy' => 'required|alpha_dash|max:12',
            'endorsed' => '',
            'status' => 'required',
        ]);

        $universalVision = UniversalVision::create($request->all());

        return response()->json($universalVision, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:255',
            'privacy' => 'required|alpha_dash|max:12',
            'endorsed' => '',
            'status' => 'required',
        ]);

        $universalVision = UniversalVision::findOrFail($id);
        $universalVision->update($request->all());

        return response()->json($universalVision, 200);
    }

    public function delete($id)
    {
        UniversalVision::findOrFail($id)->delete();
        return response('Successfully Deleted UniversalVision', 200);
    }


}
