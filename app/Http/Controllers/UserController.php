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
                //->leftJoin('universal_grooves as ug', 'ug.id', '=', 'g.universal_groove_id')
                ->leftJoin('universal_grooves as ug', function ($join) {
                    $join->on('g.universal_groove_id', '=', 'ug.id')
                        ->whereNotNull('g.universal_groove_id');
                })
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
                    'logs.id AS id',
                    'logs.type AS type',
                    't.description AS task_description',
                    't.status AS task_status',
                    't.time_remaining AS task_time_remaining',
                    'jq.type AS journal_question_type',
                    'jq.status AS journal_question_status',
                    'jq.question AS journal_question',
                    'jq.endorsed AS journal_question_endorsed',
                    'g.personal_description AS groove_personal_description',
                    'g.commitment AS groove.commitment',
                    'g.volume_amount AS groove.volume_amount',
                    'g.volume_measurement AS groove.volume_measurement',
                    'g.frequency_prefix AS groove.frequency_prefix',
                    'g.frequency_number AS groove.frequency_number',
                    'g.frequency_period AS groove.frequency_period',
                    'g.status AS groove_status',
                    'ug.user_id AS universal_groove_user_id',
                    'ug.name AS universal_groove_name',
                    'ug.privacy AS universal_groove_privacy',
                    'ug.endorsed AS universal_groove_endorsed',
                    'ug.status AS universal_groove_status',
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
