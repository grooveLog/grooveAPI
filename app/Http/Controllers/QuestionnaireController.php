<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;


class QuestionnaireController extends Controller
{

    public function getAllQuestionnaires()
    {
        return response()->json(Questionnaire::all());
    }

    public function getOneQuestionnaire($id)
    {
        return response()->json(Questionnaire::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|alpha_dash|max:32',
            'title' => 'required|max:255',
            'description' => '',
            'instructions' => '',
            'image' => 'required|url|max:255',
            'user_id' => 'integer'

        ]);

        $user = Questionnaire::create($request->all());

        return response()->json($user, 201);
    }

    public function update($id, Request $request)
    {
        //add some validation here

        $user = Questionnaire::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        Questionnaire::findOrFail($id)->delete();
        return response('Successfully Deleted Questionnaire', 200);
    }


}