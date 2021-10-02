<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tbl_client;
use App\Models\tbl_item;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hash;
use DB;

class AdminController extends Controller
{
    public function index() 
    {
        return view('Admin.dashboard');

    }

    public function addItems()
    {
        return view('Admin.add_items');

    }
    
    public function profile(Request $request)
    {
      $users = DB::table('users')
                // ->join('tbl_clients', 'users.id', '=', 'tbl_clients.id')
                ->where('id', '=', auth()->id())
                ->get();
                return view('Admin.profile', compact('users'));
    }
    public function users(Request $request)
    {

     $users = User::where('id', '!=', auth()->id())->get();
     //   $users = User::where('id', '!=', '1')->get();
        
        return view('Admin.users', compact('users'));
    }
    public function registration()
    {
        return view('Admin.create_admin_account');
    }

    public function postRegistration(Request $request)
    {  
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
       
       
         
        return redirect("/admin")->withSuccess('Account created successfully.');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */

    protected function create(array $data)
    {


        $user = new User;
        $user->role = $data['role'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user -> save();

        if($user->role == 'vendor')
            {
                $new = new tbl_client;
        $new->user_id = $user->id;
        $new -> save();

    }   

        return;
 
        // $user = new User::create([
        //     'role' => $data['role'],
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

    }

   
    protected function deleteUser($id)
    {
        
        $section = new User;
        $section::where('id', $id)->delete();
        $second_table = new tbl_client;
        $second_table::where('user_id', $id)->delete();
        
        return redirect()->route('users')->with('success', 'User has been deleted successfully');;
        

    }
}
