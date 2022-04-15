<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tbl_outdoor;
use Storage;

class OutdoorController extends Controller
{
    public function index(){

        $items = tbl_outdoor::all();
      
    return view('Admin.outdoor', compact('items'));
   }

   public function addOutdoor(Request $request){

        $outdoor = new tbl_outdoor;
      $outdoor->name = $request->name;
      $outdoor->description = $request->desc;
      $outdoor->save();       
      return redirect('/outdoor')->withSuccess('item added successfully.');


   }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_outdoor::find($id);
            return response()->json($info);
        }
    }

    public function destroy_outdoor($id)
    {   
        $picture = tbl_outdoor::where('id', $id)->value('picture');

        $section = new tbl_outdoor;
        $section::where('id', $id)->delete();
        
        Storage::delete('images/'.$picture);
        
        
        return redirect('/outdoor')->withSuccess('Item has been deleted successfully');;
    }

    public function updateOutdoor(Request $request)
    {

         $id = $request->edit_id;

         tbl_outdoor::where('id', $id)->update([
            'name' => $request->ename,
            'description' => $request->edesc    ]);

         return redirect('/outdoor')->withSuccess('Data Edited Successfully!'); 
    }

    public function uploadPhoto(Request $request)
    {

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

            tbl_outdoor::where('id', $product_id)
                        ->update([
                            'picture' => $file_name
                        ]);

        return back()->withSuccess('Picture Created successfully');
    }
}
