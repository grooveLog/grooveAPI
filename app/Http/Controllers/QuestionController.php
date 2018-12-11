<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;


class QuestionController extends Controller
{

    public function getAllQuestions()
    {
        return response()->json(Question::all());
    }

    public function getOneQuestion($id)
    {
        return response()->json(Question::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'questionnaire_id' => 'required|integer',
            'version' => 'required|integer',
            'questions' => 'required|json',
            'status' => 'required|max:12',
            'created_by' => 'required|integer'

        ]);

        $user = Question::create($request->all());

        return response()->json($user, 201);
    }

    public function update($id, Request $request)
    {
        //add some validation here

        $user = Question::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        Question::findOrFail($id)->delete();
        return response('Successfully Deleted Question', 200);
    }


}