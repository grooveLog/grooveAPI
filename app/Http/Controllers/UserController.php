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
        //
    }

    public function getUserGoals($id)
    {
        //
    }

    public function getUserGrooves($id)
    {
        //
    }

    //return a users questionnaire results
    public function getUserResults($id)
    {
        //
    }

    //return logs per user
    public function getUserlogs($id)
    {
        //
    }

    //return logs of your supporters
    public function getSupporterLogsPerUser($id)
    {
        //
    }

    //return logs of people who you are supporting
    public function getSupportingLogsPerUser($id)
    {
        //
    }

    //return logs of your Mentors
    public function getMentorLogsPerUser($id)
    {
        //
    }

    //return logs of people who you are mentoring
    public function getMentoringLogsPerUser($id)
    {
        //
    }

    public function getSupportersPerUser($id)
    {
        //
    }

    public function getSupportingPerUser($id)
    {
        //
    }

    public function getMentorsPerUser($id)
    {
        //
    }

    public function getMentoringPerUser($id)
    {
        //
    }

}
