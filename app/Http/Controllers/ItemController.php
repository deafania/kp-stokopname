<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        return view('pages.item.inventory.index');
    }

    public function create(){
        return view('pages.item.inventory.create');
    }
}
