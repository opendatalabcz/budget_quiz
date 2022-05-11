<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;

class AdminController extends Controller
{

    /**
     * Shows the home page for administration
     */
    public function index()
    {
        return view('admin.welcome', [
            'startedQuizzesCount' => Quiz::all()->count(),
            'finishedQuizzesCount' => Quiz::where('is_finished', true)->count()
        ]);
    }
}
