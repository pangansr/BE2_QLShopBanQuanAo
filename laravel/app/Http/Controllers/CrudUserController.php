<?php

namespace App\Http\Controllers;

use App\Models\favorities;
use App\Models\User;

use App\Models\Posts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CrudUserController extends Controller
{
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
            'email' => 'required|email|unique:users,id,' . $input['id'],
            'password' => 'required|min:6',
        ]);

        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->phonenumber = $input['phonenumber'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $user->image = $imageName;
        }
        $user->save();

        return redirect("list")->withSuccess('You have signed-in');
    }

    //Pham Thi Bich Buoc
    public function readUser(Request $request)
    {
        $user_id = $request->get('id');
        $users = User::find($user_id);

        return view('crud_user.read', ['users' => $users]);
    }
    public function deleteUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::findOrFail($user_id);
        if ($user->favorities->isEmpty() && $user->posts->isEmpty()) {
            // Xóa người dùng
            $user->delete();
            echo "<script>alert('Người dùng đã được xóa thành công.'); window.location.href='/list';</script>";
            //return redirect("list")->withSuccess('Người dùng đã được xóa thành công.');
        } else {
            // Redirect về trang danh sách với thông báo không thể xóa
            echo "<script>alert('k xóa được vì tồn tại sờ thích và bài viết'); window.location.href='/list';</script>";
        }
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
    public function signOut()
    {
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
    //riêng mình tao
    public function DSST()
    {
        return view('data.DSST');
    }
    public function listFavorite()
    {
        // if (Auth::check()) {
        $fr = favorities::all();
        return view('data.DSST', ['fr' => $fr]);
        // }

        //  return redirect()->route('user.list')->with('success', 'Bạn không được phép truy cập');
    }
}
