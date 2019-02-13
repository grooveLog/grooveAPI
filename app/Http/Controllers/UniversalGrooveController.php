<?php

namespace App\Http\Controllers;

use App\UniversalGroove;
use Illuminate\Http\Request;


class UniversalGrooveController extends Controller
{

    public function getAllUniversalGrooves()
    {
        return response()->json(UniversalGroove::all());
    }

    public function getOneUniversalGroove($id)
    {
        return response()->json(UniversalGroove::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required|alpha_dash|max:255',
            'privacy' => 'required|alpha_dash|max:12',
            'endorsed' => '',
            'status' => 'required',
        ]);

        $universalGroove = UniversalGroove::create($request->all());

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

        $universalGroove = UniversalGroove::findOrFail($id);
        $universalGroove->update($request->all());

        return response()->json($universalGroove, 200);
    }

    public function delete($id)
    {
        UniversalGroove::findOrFail($id)->delete();
        return response('Successfully Deleted Universal Groove', 200);
    }

}

