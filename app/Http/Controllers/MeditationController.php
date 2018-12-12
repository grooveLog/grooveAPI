<?php

namespace App\Http\Controllers;

use App\Meditation;
use Illuminate\Http\Request;


class MeditationController extends Controller
{

    public function getAllMeditations()
    {
        return response()->json(Meditation::all());
    }

    public function getOneMeditation($id)
    {
        return response()->json(Meditation::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|alpha_dash',
            'meditation_attribution_id' => 'required|integer',
        ]);

        $meditation = Meditation::create($request->all());

        return response()->json($meditation, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'text' => 'required|alpha_dash',
            'meditation_attribution_id' => 'required|integer',
        ]);

        $meditation = Meditation::findOrFail($id);
        $meditation->update($request->all());

        return response()->json($meditation, 200);
    }

    public function delete($id)
    {
        Meditation::findOrFail($id)->delete();
        return response('Successfully Deleted Meditation', 200);
    }


}