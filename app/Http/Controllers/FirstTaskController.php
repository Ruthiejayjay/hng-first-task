<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class FirstTaskController extends Controller
{
    public function index(Request $request)
    {
        try {
            $request->validate([
                'slack_name' => 'required',
                'track' => 'required'
            ]);
            $slack_name = $request->query('slack_name');
            $track = $request->query('track');

            return response()->json([
                'slack_name' => $slack_name,
                'current_day' => now()->format('l'),
                'utc_time' => Carbon::now(),
                'track' => $track,
                'status_code' => 200

            ]);
        } catch (Exception $e) {
            $errorMsg = $e->getMessage();
            return response()->json([
                'error' => $errorMsg,
                'status_code' =>500
            ]);
        }
    }
}