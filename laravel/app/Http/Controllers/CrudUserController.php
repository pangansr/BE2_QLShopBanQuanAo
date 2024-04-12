<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CrudUserController extends Controller
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
    //Pham Thi Thanh Tam
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
        ]);

       $user = User::find($input['id']);
       $user->name = $input['name'];
       $user->email = $input['email'];
       $user->password = $input['password'];
       $user->phonenumber = $input['phonenumber'];
       if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $user->image = $imageName;
        }
       $user->save();

        return redirect("list")->withSuccess('You have signed-in');
    }

>>>>>>> 7-update
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



<<<<<<< HEAD
>>>>>>> 6-view_delete
=======
>>>>>>> 7-update
    //Nguyen Huu Kien
    public function listUser()
     {
        // if (Auth::check()) {
<<<<<<< HEAD
<<<<<<< HEAD
           //  $users = User::all();
             $users = User::paginate(1); 
=======
             $users = User::all();
>>>>>>> 6-view_delete
=======
             $users = User::all();
>>>>>>> 7-update
             return view('crud_user.list', ['users' => $users]);
        // }
       
       //  return redirect()->route('user.list')->with('success', 'Bạn không được phép truy cập');
     }



<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 3-listOfUser
=======
>>>>>>> 6-view_delete
=======
>>>>>>> 7-update
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
             return redirect()->intended('dashboard');
             //->withSuccess('Signed in');
=======
             return redirect()->intended('list')
                 ->withSuccess('Signed in');
>>>>>>> 3-listOfUser
=======
             return redirect()->intended('list')
                 ->withSuccess('Signed in');
>>>>>>> 6-view_delete
=======
             return redirect()->intended('list')
                 ->withSuccess('Signed in');
>>>>>>> 7-update
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
           
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

            
=======
>>>>>>> 3-listOfUser
=======
>>>>>>> 6-view_delete
=======
>>>>>>> 7-update
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