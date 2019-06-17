<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;


class LogController extends Controller
{

    public function getAllLogs()
    {
        return response()->json(Log::all())->paginate(25);
    }

    public function getOneLog($id)
    {
        return response()->json(Log::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'type' => 'required|alpha_dash|max:12',
            'groove_id' => 'integer',
            'task_id' => 'integer',
            'introspection' => '',
            'journal_question_id' => 'integer',
            'performed_at' => '',
            'success_type' => 'alpha_dash|max:12',
            'comment' => 'max:255',
            'mood_score' => 'integer',
            'entry' => 'max:5000'
        ]);

        $logs = Log::create($request->all());

        return response()->json($logs, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'type' => 'required|alpha_dash|max:12',
            'groove_id' => 'integer',
            'task_id' => 'integer',
            'introspection' => '',
            'journal_question_id' => 'integer',
            'performed_at' => '',
            'success_type' => 'alpha_dash|max:12',
            'comment' => 'max:255',
            'mood_score' => 'integer',
            'entry' => 'max:5000'
        ]);

        $logs = Log::findOrFail($id);
        $logs->update($request->all());

        return response()->json($logs, 200);
    }

    public function delete($id)
    {
        Log::findOrFail($id)->delete();
        return response('Successfully Deleted Log', 200);
    }

    public function deleteGrooveLogs($grooveId){
        //
    }


}