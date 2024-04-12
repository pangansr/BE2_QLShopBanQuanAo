<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CrudUserController extends Controller
{
    public function createUser()
    {
        return view('crud_user.create');
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
        return redirect("create")->withSuccess('You have signed-in');
    }
}
}