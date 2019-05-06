<?php

namespace App\Http\Controllers;

use App\DailyJournalQuestions;
use Illuminate\Http\Request;


class DailyJournalQuestionsController extends Controller
{

    public function getAllJournalQuestionsOfTheDay()
    {
        return response()->json(DailyJournalQuestions::all());
    }

    public function getOneDailyJournalQuestion($id)
    {
        return response()->json(DailyJournalQuestions::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'set_by' => 'required',
            'question_id' => 'required',
            'day' => 'required'
        ]);

        $questions = DailyJournalQuestions::create($request->all());

        return response()->json($questions, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'set_by' => 'required',
            'question_id' => 'required',
            'day' => 'required'
        ]);

        $questions = DailyJournalQuestions::findOrFail($id);
        $questions->update($request->all());

        return response()->json($questions, 200);
    }

    public function delete($id)
    {
        DailyJournalQuestions::findOrFail($id)->delete();
        return response('Successfully Deleted DailyJournalQuestions', 200);
    }

    public function getTodaysQuestion()
    {
        $today = date("Y-m-d");
        return response()->json(DailyJournalQuestions::where('day', $today)
        ->get()
        );
    }


}