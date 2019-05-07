<?php

namespace App\Http\Controllers;

use App\DailyJournalQuestions;
use Illuminate\Http\Request;


class DailyJournalQuestionsController extends Controller
{
    const DEFAULT_QUESTIONS = [1, 3, 7]; // list of default ids for questions of the day in-case none have been set

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
        $result = DailyJournalQuestions::where('day', $today)
            ->get();

        if ($result->isEmpty()) {
            // Set a random Question of The Day
            $id = self::DEFAULT_QUESTIONS[array_rand(self::DEFAULT_QUESTIONS)];
            $setQuestion = [
                'set_by' => 'system',
                'question_id' => $id,
                'day' => $today
            ];

            //$setQuestion = json_encode($setQuestion);
            $settingQuestion = DailyJournalQuestions::create($setQuestion);
            return response()->json($settingQuestion, 201);
        }
        else {
            return response()->json($result);
        }
    }

}