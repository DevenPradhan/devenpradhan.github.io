<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemRequest;
use Storage;
use Auth;


class ItemRequestController extends Controller
{
    public function index()
    {
        return view('Client.upload');

    }

    public function upload(Request $request){

        $validated = $request->validate([

            'picture' => 'mimes:jpeg,png|max: 2048']);

        $item = new ItemRequest;
        $item->category = $request->category;
        $item->client = Auth::User()->id;
        $item->name = $request->name;
        $item->description = $request->description;

        if(!empty($request->file('picture'))){

            $picture = $request->file('picture');
            $picture_path = time().'_'.$picture->getClientOriginalName();
            Storage::putFileAs('images', $picture, $picture_path);
        }
        
        $item->picture = $picture_path;
        $item->save();

        return redirect('user')->withSuccess('item request sent successfully!');
    }
}
