<?php

namespace App\Http\Controllers;

use App\QuestionnaireRating;
use Illuminate\Http\Request;


class QuestionnaireRatingController extends Controller
{

    public function getAllQuestionnaireRatings()
    {
        return response()->json(QuestionnaireRating::all());
    }

    public function getOneQuestionnaireRating($id)
    {
        return response()->json(QuestionnaireRating::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'questionnaire_id' => 'required|integer',
            'questions_id' => 'required|integer',
            'rating' => 'required|integer',
            'comment' => 'alpha_dash',
        ]);

        $rating = QuestionnaireRating::create($request->all());

        return response()->json($rating, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'questionnaire_id' => 'required|integer',
            'questions_id' => 'required|integer',
            'rating' => 'required|integer',
            'comment' => 'alpha_dash',
        ]);

        $rating = QuestionnaireRating::findOrFail($id);
        $rating->update($request->all());

        return response()->json($rating, 200);
    }

    public function delete($id)
    {
        QuestionnaireRating::findOrFail($id)->delete();
        return response('Successfully Deleted QuestionnaireRating', 200);
    }


}
