<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePage;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Worker;

class HomeController extends Controller
{
    //
    public function index(){

        $services = Service::with('categories')->get();
        $HomePage = HomePage::all();
        $category = Category::all();

        return view('user.index',compact('HomePage','services','category'));
    }


    public function showWorker($category)
    {
        $category = Category::findOrFail($category);
        $workers = $category->workers;

        // Calculate average ratings for each worker
        $averageRatings = [];
        foreach ($workers as $worker) {
            $averageRatings[$worker->id] = $worker->averageRating();
        }

        return view('user.showWorker', compact('workers', 'averageRatings'));
    }




}
