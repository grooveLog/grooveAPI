<?php

namespace App\Http\Controllers;

use App\User;
use App\Vision;
use App\Goal;
use App\Groove;
use App\Answer;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function getAllUsers()
    {
        return response()->json(User::all());
    }

    public function getOneUser($id)
    {
        return response()->json(User::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'display_name' => 'required|max:255',
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'email' => 'required|email|unique:users|max:255',
            'gender' => 'max:1',
            'birthday'=> '',
            'image' => '',
            'locale' => '',
            'status' => ''
        ]);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'display_name' => 'max:255',
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'email' => 'email|unique:users|max:255',
            'gender' => 'max:1',
            'birthday'=> '',
            'image' => '',
            'locale' => '',
            'status' => ''
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return response('Successfully Deleted User', 200);
    }

    public function getUserVisions($id)
    {
        return response()->json(
            User::findOrFail($id)
                ->visions()
                ->leftJoin('universal_visions as uv', 'uv.id', '=', 'visions.universal_vision_id')
                ->get(['visions.*', 'uv.*', 'visions.id AS id'])
        );
    }

    public function getUserGoals($id)
    {
        return response()->json(
            User::findOrFail($id)
                ->goals()
                ->leftJoin('universal_goals as ug', 'ug.id', '=', 'goals.universal_goal_id')
                ->with('visions')
                ->get(['goals.*', 'ug.*', 'goals.id AS id'])
        );
    }

    public function getUserGrooves($id)
    {
        return response()->json(
            User::findOrFail($id)
                ->grooves()
                ->leftJoin('universal_grooves as ug', 'ug.id', '=', 'grooves.universal_groove_id')
                ->get(['grooves.*', 'ug.*', 'grooves.id AS id'])
        );
    }

    //return a users questionnaire results
    public function getUserAnswers($id)
    {
        return response()->json(Answer::where('answers.user_id','=', $id)
            ->get()
        );
    }

    //return paginated logs per user
    public function getUserLogs($id)
    {
        return response()->json(
            User::findOrFail($id)
                ->logs()
                ->leftJoin('grooves as g', function ($join) {
                    $join->on('logs.groove_id', '=', 'g.id')
                        ->whereNotNull('logs.groove_id');
                })
                ->leftJoin('universal_grooves as ug', 'ug.id', '=', 'g.universal_groove_id')
                ->leftJoin('tasks as t', function ($join) {
                    $join->on('logs.task_id', '=', 't.id')
                        ->whereNotNull('logs.task_id');
                })
                ->leftJoin('journal_questions as jq', function ($join) {
                    $join->on('logs.journal_question_id', '=', 'jq.id')
                        ->whereNotNull('logs.journal_question_id');
                })
                ->select([
                    'logs.*',
                    't.*',
                    'jq.*',
                    'g.*',
                    'ug.*',
                    'logs.id AS id',
                    'logs.type AS type',
                    'jq.type AS journal_question_type',
                    'jq.status AS journal_question_status',
                    'g.status AS groove_status',
                ])
                ->paginate(15)
        );

    }

    //return logs of your supporters
    public function getSupporterLogsPerUser($id)
    {
        //tables and models not defined yet
    }

    //return logs of people who you are supporting
    public function getSupportingLogsPerUser($id)
    {
        //tables and models not defined yet
    }

    //return logs of your Mentors
    public function getMentorLogsPerUser($id)
    {
        //tables and models not defined yet
    }

    //return logs of people who you are mentoring
    public function getMentoringLogsPerUser($id)
    {
        //tables and models not defined yet
    }

    public function getSupportersPerUser($id)
    {
        //tables and models not defined yet
    }

    public function getSupportingPerUser($id)
    {
        //tables and models not defined yet
    }

    public function getMentorsPerUser($id)
    {
        //tables and models not defined yet
    }

    public function getMentoringPerUser($id)
    {
        //tables and models not defined yet
    }

}
