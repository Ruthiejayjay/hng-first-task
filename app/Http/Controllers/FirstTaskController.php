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
            $date = Carbon::now();
            $date->toTimeString();

            return response()->json([
                'slack_name' => $slack_name,
                'current_day' => now()->format('l'),
                'utc_time' => $date->toIso8601ZuluString(),
                'track' => $track,
                'github_file_url' => 'https://github.com/Ruthiejayjay/hng-first-task/blob/main/app/Http/Controllers/FirstTaskController.php',
                'github_repo_url' => 'https://github.com/Ruthiejayjay/hng-first-task',
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
