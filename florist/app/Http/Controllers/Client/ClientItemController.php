<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tbl_item;

class ClientItemController extends Controller
{
    
    public function index()
    {

        $items = tbl_item::all();


        return view('Client.itemsList', compact('items'));
    }
}
