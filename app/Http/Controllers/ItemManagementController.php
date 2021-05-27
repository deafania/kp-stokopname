<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemManagementController extends Controller
{
    public function incoming_index(){
        return view('pages.item.management.incoming');
    }
   

    public function outcoming_index(){
        return view('pages.item.management.outcoming');
    }
     public function editbarang($id)
    {
        return view('inventory.report.unit.edit');
    }
}
