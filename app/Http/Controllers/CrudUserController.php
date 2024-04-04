<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CrudUserController extends Controller
{
    //Pham Thi Bich Buoc
    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $users = User::find($user_id);

        return view('crud_user.read', ['users' => $users]);
    }
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }



    //Nguyen Huu Kien
    public function listUser()
     {
        // if (Auth::check()) {
             $users = User::all();
             return view('crud_user.list', ['users' => $users]);
        // }
       
       //  return redirect()->route('user.list')->with('success', 'Bạn không được phép truy cập');
     }



     //Tran Huu Nam
     public function login()
     {
         return view('crud_user.login');
     }
 
     public function authUser(Request $request)
     {
         $request->validate([
             'email' => 'required',
             'password' => 'required',
         ]);
 
         $credentials = $request->only('email', 'password');
 
          if (Auth::attempt($credentials)) {
             return redirect()->intended('list')
                 ->withSuccess('Signed in');
        }
         return redirect("login")->withSuccess('Login details are not valid');
     }
     public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }


     //Pham Thanh Liem
    public function createUser()
    {
        return view('crud_user.create');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phonenumber' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $imageName = null;
    
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName(); 
            $request->image->move(public_path('images'), $imageName); 
           
            $data = $request->all();
            $check = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phonenumber' => $data['phonenumber'],
                'image' => $imageName,
            ]);
            $data['image'] = $imageName; 
        //$check = $this->create($data);
        //$user = User::create($data);
        return redirect("login")->withSuccess('You have signed-in');
    }
}
}