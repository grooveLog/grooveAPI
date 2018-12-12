<?php

namespace App\Http\Controllers;

use App\MeditationAttribution;
use Illuminate\Http\Request;


class MeditationAttributionController extends Controller
{

    public function getAllMeditationAttributions()
    {
        return response()->json(MeditationAttribution::all());
    }

    public function getOneMeditationAttribution($id)
    {
        return response()->json(MeditationAttribution::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:255',
            'image' => 'required|url|max:255',
        ]);

        $attribution = MeditationAttribution::create($request->all());

        return response()->json($attribution, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:255',
            'image' => 'required|url|max:255',
        ]);

        $attribution = MeditationAttribution::findOrFail($id);
        $attribution->update($request->all());

        return response()->json($attribution, 200);
    }

    public function delete($id)
    {
        MeditationAttribution::findOrFail($id)->delete();
        return response('Successfully Deleted Meditation Attribution', 200);
    }

}