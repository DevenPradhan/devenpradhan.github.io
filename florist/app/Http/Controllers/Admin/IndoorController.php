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
      $indoor->description = $request->desc;
      $indoor->save();       
      return redirect('/indoor')->withSuccess('item added successfully.');

   }
   public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_indoor::find($id);
            return response()->json($info);
        }
    }
    public function updateIndoor(Request $request)
    {
        $id = $request->edit_id;
        $name = $request->ename;
        $desc = $request->edesc;
        $in = new tbl_indoor;
        $in::where('id',$id)
            ->update([
                'name' => $name,
                'description' => $desc 
                ]);
        return redirect('/indoor')->withSuccess('Data Edited Successfully!'); 
    }
   public function destroy_indoor($id)
    {
        $section = new tbl_indoor;
        $section::where('id', $id)->delete();
        return redirect('/indoor')->withSuccess('Item has been deleted successfully');;
    }
}
