<?php

namespace App\Http\Controllers;

use App\UserTerm;
use Illuminate\Http\Request;


class UserTermController extends Controller
{

    public function getAllUserTerms()
    {
        return response()->json(UserTerm::all());
    }

    public function getOneUserTerm($id)
    {
        return response()->json(UserTerm::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|alpha_dash|max:32',
            'text' => 'required|alpha_dash',

        ]);

        $user = UserTerm::create($request->all());

        return response()->json($user, 201);
    }

    public function update($id, Request $request)
    {
        //add some validation here

        $user = UserTerm::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        UserTerm::findOrFail($id)->delete();
        return response('Successfully Deleted User Term', 200);
    }


}