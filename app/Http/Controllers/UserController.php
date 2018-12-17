<?php

namespace App\Http\Controllers;

use App\User;
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
            'username' => 'required|alpha_dash|max:255',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'gender' => 'alpha|max:1',
            'locale' => 'required',
            'status' => 'required'
        ]);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'username' => 'required|alpha_dash|max:255',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'gender' => 'alpha|max:1',
            'locale' => 'required',
            'status' => 'required'
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
        return response()->json(User::find($id)
            ->join('visions', 'users.id', '=', 'visions.user_id')
        );
    }

    public function getUserGoals($id)
    {
        return response()->json(User::find($id)
            ->join('goals', 'users.id', '=', 'goals.user_id')
        );
    }

    public function getUserGrooves($id)
    {
        return response()->json(User::find($id)
            ->join('grooves', 'users.id', '=', 'grooves.user_id')
        );
    }

    //return a users questionnaire results
    public function getUserAnswers($id)
    {
        return response()->json(User::find($id)
            ->join('answers', 'users.id', '=', 'answers.user_id')
        );
    }

    //return logs per user
    public function getUserlogs($id)
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
