<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemRequest;
use App\Models\tbl_indoor;
use App\Models\tbl_outdoor;
use App\Models\tbl_accessories;
use Storage;

class RequestsController extends Controller
{
    public function index()
    {

       
        $requests = ItemRequest::all();
        

        return view('Admin.add_items', compact('requests'));

    }

    public function approveRequest(Request $request, $id)
    {
       
        $category = $request->category;
           

        if($category == 'indoor'){

            $new = new tbl_indoor;
            $new->name = $request->name;
            $new->description = $request->description;
            $new->picture = $request->picture;
            $new->save();

           
        }

        if($category == 'outdoor'){

            $new = new tbl_outdoor;
            $new->name = $request->name;
            $new->description = $request->description;
            $new->picture = $request->picture;
            $new->save();


        }

        if($category == 'accessories')
        {

            $new = new tbl_accessories;
            $new->name = $request->name;
            $new->description = $request->description;
            $new->picture = $request->picture;
            $new->save();
        }


            ItemRequest::where('id', $id)->delete();


         return redirect('requests.get')->withSuccess('Request has been accepted');
    
    
    }

    public function rejectRequest($id)
    {
        

        $picture = ItemRequest::where('id', $id)->value('picture');
         
        Storage::delete('images/'.$picture);
        ItemRequest::where('id', $id)->delete();

        return back()->withSuccess('request has been deleted');
    }
    
}
