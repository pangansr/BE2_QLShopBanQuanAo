@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="container">
            <h1 style="text-align: center; margin: 15px">View user</h1>
            <div style="position: absolute;"> 
                <img src="{{ asset('images/' . $users->image) }}" alt="{{ $users->name }}" style="width: 300px; height: 300px; margin-right: 20px; border: 5px rgb(0, 249, 54) double">          
                   <div style="float: right;">
                    <h3>Name: {{$users->name}}</h3>
                    <p>ID: {{$users->id}}</p>
                    <p>Email: {{$users->email}}</p>
                    <p>Phonenumber: {{$users->phonenumber}}</p>
                   </div>
                   
            </div>
        </div>
    </main>
@endsection