@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">User List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phonenumber }}</td>
                                        <td>
                                            @if($user->image)
                                            <img src="{{ asset('images/' . $user->image) }}" alt="{{ $user->name }}" class="img-thumbnail" style="width: 70px; height: 70px;">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.readUser', ['id' => $user->id]) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('user.updateUser', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="#" onclick="confirmDelete({{ $user->id }})" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function confirmDelete(userId) {
        if(confirm('Bạn có chắc muốn xóa người dùng với ID:' +userId+ ' này không?')) {
            window.location.href = '/delete?id=' + userId;
        }
    }
</script>
@endsection
