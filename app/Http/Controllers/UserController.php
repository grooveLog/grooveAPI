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
              'locale' => 'required'

          ]);

          $user = User::create($request->all());

          return response()->json($user, 201);
      }

      public function update($id, Request $request)
      {
          //add some validation here

          $user = User::findOrFail($id);
          $user->update($request->all());

          return response()->json($user, 200);
      }

      public function delete($id)
      {
          User::findOrFail($id)->delete();
          return response('Successfully Deleted User', 200);
      }

}
