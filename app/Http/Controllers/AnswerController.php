<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;


class AnswerController extends Controller
{

    public function getAllAnswers()
    {
        return response()->json(Answer::all());
    }

    public function getOneAnswer($id)
    {
        return response()->json(Answer::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'questionnaire_id' => 'required|integer',
            'question_id' => 'required|integer',
            'answers' => 'required|json',
            'started_at' => 'required',
            'submitted_at' => '',
            'status' => 'required|alpha_dash'
        ]);

        $user = Answer::create($request->all());

        return response()->json($user, 201);
    }

    public function update($id, Request $request)
    {
        //add some validation here

        $user = Answer::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        Answer::findOrFail($id)->delete();
        return response('Successfully Deleted User Term', 200);
    }


}