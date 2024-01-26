<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeDashboardController extends Controller
{
    //

    public function home(){

        // Count the number of users
        $numberOfUsers = DB::table('users')->where('role', 'user')->count();

        // Count the number of workers
        $numberOfWorkers = DB::table('users')->where('role', 'worker')->count();


         // Calculate the grand total of profits
        $grandTotalProfits = DB::table('tasks')
        ->where('status', 'Completed')
        ->sum('total');

        // Calculate the number of tasks with a completed status
        $completedTasksCount = DB::table('tasks')
            ->where('status', 'Completed')
            ->count();


        return view('admin.home',compact('numberOfUsers','numberOfWorkers','grandTotalProfits','completedTasksCount'));
    }
}
