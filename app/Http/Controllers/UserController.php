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
        $response = response()->json(
            User::findOrFail($id)
                ->goals()
                ->leftJoin('universal_goals as ug', 'ug.id', '=', 'goals.universal_goal_id')
                ->with('visions')
                ->get(['goals.*', 'ug.*', 'goals.id AS id'])
        );

        foreach ($response as $key => $value) {
            //
    }

        return $response;
    }

    public function getUserGrooves($id)
    {
        return response()->json(
            User::findOrFail($id)
                ->grooves()
                ->join('universal_grooves as ug', 'ug.id', '=', 'grooves.universal_groove_id')
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

    //return logs per user
    public function getUserLogs($id)
    {
        //need to create either a logs table or individual logs per type
        //tables and models not defined yet
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
