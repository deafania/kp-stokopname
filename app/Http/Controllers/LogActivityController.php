<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    public function index()
    {
        return view('pages.log.index');
    }
}
