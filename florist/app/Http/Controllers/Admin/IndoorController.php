<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_indoor;

class IndoorController extends Controller
{
   public function index(){
      $items = tbl_indoor::get();

    return view('Admin.indoor', compact('items'));
   }

   public function addIndoor(Request $request){
      $indoor = new tbl_indoor;
      $indoor->name = $request->name;
      $indoor->save();       
      return redirect()->route('get_indoor');

   }
}
