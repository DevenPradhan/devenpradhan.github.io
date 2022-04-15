<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tbl_accessories;

class AccessoryController extends Controller
{
    public function index()
    {
        $items = tbl_accessories::all();
         return view('Admin.accessories', compact('items'));
    }

    public function addAccessory(Request $request){
      $indoor = new tbl_accessories;
      $indoor->name = $request->name;
      $indoor->description = $request->desc;
      $indoor->save();       
      return back()->withSuccess('item added successfully.');

   }
}
