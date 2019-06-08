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
        return response()->json(
            Groove::findOrFail($id)
                ->leftJoin('universal_grooves as ug', 'ug.id', '=', 'grooves.universal_groove_id')
                ->where('grooves.id', $id)
                ->select('grooves.*', 'ug.*', 'grooves.id AS id')
                ->first()
        );
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'universal_groove_id' => 'required|integer',
            'personal_description' => 'max:255',
            'privacy' => '',
            'commitment' => 'integer',
            'volume_amount' => 'integer',
            'volume_measurement' => 'alpha_dash|max:12',
            'frequency_prefix' => 'alpha_dash|max:12',
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
            'universal_groove_id' => 'required|integer',
            'personal_description' => 'max:255',
            'privacy' => '',
            'commitment' => 'integer',
            'volume_amount' => 'integer',
            'volume_measurement' => 'alpha_dash|max:12',
            'frequency_prefix' => 'alpha_dash|max:12',
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
