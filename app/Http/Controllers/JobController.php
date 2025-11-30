<?php

namespace App\Http\Controllers;

class JobController extends Controller
{
    //
    public static function all()
    {
        return view('job.index');
    }
}
