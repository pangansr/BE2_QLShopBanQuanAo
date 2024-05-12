@extends('dashboard')

@section('content')
    
        <div class="container">
            <h1 style="text-align: center; margin: 15px">View users</h1>
            <div> 
                <img src="{{ asset('images/' . $users->image) }}" alt="{{ $users->name }}" style="width: 300px; height: 300px; margin-right: 20px; border: 5px rgb(0, 249, 54) double">          
                   <div style="float: right;">
                    <h3>Name: {{$users->name}}</h3>
                    <p>ID: {{$users->id}}</p>
                    <p>Email: {{$users->email}}</p>
                    <p>Phonenumber: {{$users->phonenumber}}</p>
                    {{-- //<p>địa chỉ: {{$users->profile->address}}</p> --}}
                   </div>
                   
            </div>
    
            <div class="container">
                <div class="row">
                    <h4>Profile (1-1)</h4>
                    @if(!empty($users->profile))
                        First name : {{$users->profile->first_name}} <br>
                        Last name : {{$users->profile->last_name}} <br>
                    @endif
                </div>
                <div class="row">
                    <h4>Danh sách bài viết đã viết (1 - N)</h4>
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Post name</th>
                        </thead>
                        <tbody>
                            @foreach($users->posts as $post)
                            <tr>
                                <td>{{ $post->post_id }}</td>
                                <td>{{ $post->post_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
                <div class="row">
                    <h4>Danh sách sở thích (N-N)</h4>
                    <table>
                        <thead>
                        <th>ID</th>
                        <th>Favorite</th>
                        </thead>
                        <tbody>
                        @foreach($users->favorities as $favorite)
                            <tr>
                                <td>{{ $favorite->favorite_id }}</td>
                                <td>{{ $favorite->favorite_name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection