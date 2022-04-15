<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_indoor;
use App\Models\tbl_outdoor;
use App\Models\tbl_accessories;



class InventoryController extends Controller
{
    public function indoors(){

        $items = tbl_indoor::all();

        return view('Client.list_indoor', compact('items'));
    }

    public function outdoors(){

        $items = tbl_outdoor::all();

        return view('Client.list_outdoor', compact('items'));
    }

    public function accessories(){

        $items = tbl_accessories::all();


        return view('Client.list_accessories', compact('items'));
    }
}
