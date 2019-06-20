<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


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

    public function getGrooveLogStats($grooveId)
    {
        $results = Log::where('groove_id', $grooveId)
            ->where('performed_at', '>=', Carbon::parse('first day of January'))
            ->select(
                'performed_at'
            )->get();

        $dates = [];
        //set up all weeks
        $currentWeekOfYear = Carbon::now()->weekOfYear;

        $thisYearWeekly = array_fill(1, $currentWeekOfYear, 0);
        $thisYearTotal = count($results);

        $thisMonth = array_fill(1, Carbon::now()->format('d'), 0);
        $thisMonthTotal = 0;

        $thisWeekDaily = [
            'mon' => 0,
            'tues' => 0,
            'weds' => 0,
            'thurs' => 0,
            'fri' => 0,
            'sat' => 0,
            'sun' => 0
        ];
        $thisWeekTotal = 0;

        $currentMonth = Carbon::now()->month;

        $thisMonday = Carbon::now()->startOfWeek();

        $startOfMonth = Carbon::now()->startOfMonth();

        foreach ($results as $res) {
            $date = $res->performed_at;

            //this year
            $weekOfYear = Carbon::parse($date)->weekOfYear;
            $thisYearWeekly[$weekOfYear]++;

            //this month
            if (Carbon::parse($date)->gt(Carbon::parse($startOfMonth))) {
                $thisMonth[Carbon::parse($date)->format('d')] ++;
                $thisMonthTotal ++;
            }

            //this week
            if (Carbon::parse($date)->gt(Carbon::parse($thisMonday))) {
                switch ($date) {
                    case $thisMonday->format('Y-m-d'):
                        $thisWeekDaily['mon'] ++;
                        $thisWeekTotal ++;
                        break;
                    case $thisMonday->copy()->addDays(1)->format('Y-m-d'):
                        $thisWeekDaily['tues'] ++;
                        $thisWeekTotal ++;
                        break;
                    case $thisMonday->copy()->addDays(2)->format('Y-m-d'):
                        $thisWeekDaily['weds'] ++;
                        $thisWeekTotal ++;
                        break;
                    case $thisMonday->copy()->addDays(3)->format('Y-m-d'):
                        $thisWeekDaily['thurs'] ++;
                        $thisWeekTotal ++;
                        break;
                    case $thisMonday->copy()->addDays(4)->format('Y-m-d'):
                        $thisWeekDaily['fri'] ++;
                        $thisWeekTotal ++;
                        break;
                    case $thisMonday->copy()->addDays(5)->format('Y-m-d'):
                        $thisWeekDaily['sat'] ++;
                        $thisWeekTotal ++;
                        break;
                    case $thisMonday->copy()->addDays(6)->format('Y-m-d'):
                        $thisWeekDaily['sun'] ++;
                        $thisWeekTotal ++;
                        break;
                }
                array_push($dates, $date);
            }
        }
        return response()->json(
            [
                'thisYear' => [
                    'data' => $thisYearWeekly,
                    'dataDescription' => 'Totals per week',
                    'total' => $thisYearTotal
                ],
                'thisMonth' => [
                    'data' => $thisMonth,
                    'dataDescription' => 'Totals for current month',
                    'total' => $thisMonthTotal
                ],
                'thisWeek' => [
                    'data' => $thisWeekDaily,
                    'dataDescription' => 'Totals per day for this week',
                    'total' => $thisWeekTotal
                ]
            ]
        );
    }

    public function deleteGrooveLogs($grooveId){
        log::where('groove_id', $grooveId)->delete();
        //needs to handle exceptions
    }


}