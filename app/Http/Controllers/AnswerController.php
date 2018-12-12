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
            'questions_id' => 'required|integer',
            'answers' => 'required|json',
            'started_at' => 'required',
            'status' => 'required|alpha_dash'
        ]);

        $answer = Answer::create($request->all());

        return response()->json($answer, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'answers' => 'required|json',
            'submitted_at' => '',
            'status' => 'required|alpha_dash'
        ]);

        $answer = Answer::findOrFail($id);
        $answer->update($request->all());

        return response()->json($answer, 200);
    }

    public function delete($id)
    {
        Answer::findOrFail($id)->delete();
        return response('Successfully Deleted Answer', 200);
    }


}