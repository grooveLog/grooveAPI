<?php

namespace App\Http\Controllers;

use App\JournalQuestion;
use Illuminate\Http\Request;


class JournalQuestionController extends Controller
{

    public function getAllJournalQuestions()
    {
        return response()->json(JournalQuestion::all());
    }

    public function getOneJournalQuestion($id)
    {
        return response()->json(JournalQuestion::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'question' => 'required',
            'type' => 'required|alpha_dash|max:12',
            'endorsed' => '',
            'status'  => 'required|alpha_dash|max:12',
        ]);

        $questions = JournalQuestion::create($request->all());

        return response()->json($questions, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'question' => 'required',
            'type' => 'required|alpha_dash|max:12',
            'endorsed' => '',
            'status'  => 'required|alpha_dash|max:12',
        ]);

        $questions = JournalQuestion::findOrFail($id);
        $questions->update($request->all());

        return response()->json($questions, 200);
    }

    public function delete($id)
    {
        JournalQuestion::findOrFail($id)->delete();
        return response('Successfully Deleted JournalQuestion', 200);
    }

    public function getRandomJournalQuestion ()
    {
        $random = JournalQuestion::inRandomOrder()
            ->where('status', 'ACTIVE')
            ->where('endorsed', true)
            ->first();
        return response()->json($random, 200);
    }

}