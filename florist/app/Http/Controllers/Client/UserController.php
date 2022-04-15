<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\tbl_client;
use App\Models\tbl_item;


class UserController extends Controller
{
    public function index()
    {   
        $user = DB::table('users')
                ->where('id', auth()->id())
                ->get();

        $data = tbl_client::where('user_id', auth()->id())->get();

        return view('Client.dashboard', compact('user', 'data'));
    }

    
    public function profile()
    {
            $users = DB::table('users')
                    // ->join('tbl_clients', 'users.id', '=', 'tbl_clients.id')
                    ->where('id', '=', auth()->id())
                    ->get();

            $client = tbl_client::where('user_id', Auth::User()->id)->get();

        return view('Client.profile', compact('users','client'));
    }

    public function full_profile()
    {   
        
        $user = tbl_client::where('user_id', Auth::User()->id)->get();
        
        return view('Client.edit', compact('user'));
    }
    

    public function edit(Request $request)
    {
            $cid_no = $request->cid_no;
            $address = $request->address;
            $contact_no = $request->contact_no;

            $client = new tbl_client;
            $client::where('user_id', Auth::user()->id)
            ->update([
                'cid_no' => $cid_no,
                'address' => $address,
                'contact_no' => $contact_no
            ]);

        return redirect('/user.profile')->with('success','Data Edited Successfully!');
    }


}
