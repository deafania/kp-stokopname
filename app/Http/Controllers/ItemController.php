<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        return view('pages.items.index');
    }

    public function create(){
        return view('pages.items.create');
    }
}
