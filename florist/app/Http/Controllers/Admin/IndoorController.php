<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_indoor;
use Storage;

class IndoorController extends Controller
{
   public function index(){
      $items = tbl_indoor::all();

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
        $picture = tbl_indoor::where('id', $id)->value('picture');

        $section = new tbl_indoor;
        $section::where('id', $id)->delete();
        
                    Storage::delete('images/'.$picture);
        
        
        return redirect('/indoor')->withSuccess('Item has been deleted successfully');;
    }

    public function uploadPhoto(Request $request){

         $validated = $request->validate([
            'photo' => 'mimes:jpeg,png']);
        
            $product_id = $request->id;
            $file       = $request->file('photo');
            $name       = $request->name;
            $extension  = $file->extension();
        
        if(!empty($request->name)){

            $file_name = $name.'.'.$extension;

        }else{
            $file_name = $file->getClientOriginalName();
        }
        
        Storage::putFileAs('images', $file, $file_name);

        tbl_indoor::where('id', $product_id)->update([
                'picture' => $file_name
                 ]);

        return back()->withSuccess('Picture Created successfully');
    }
}
