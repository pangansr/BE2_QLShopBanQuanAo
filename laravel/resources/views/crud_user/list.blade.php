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
                                            <a href="" class="btn btn-sm btn-info">View</a>
                                            <a href="" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                            <link href="{{ asset('css/pagination.css') }}" rel="stylesheet">
                        <!-- Container cho thanh phân trang -->
                        <div class="pagination-container">
                            <!-- Hiển thị nút Quay lại -->
                            @if ($users->onFirstPage())
                                <span class="disabled">&laquo;</span>
                            @else
                                <a href="{{ $users->previousPageUrl() }}" rel="prev">&laquo;</a>
                            @endif

                            <!-- Hiển thị các trang -->
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <a href="{{ $users->url($i) }}" class="{{ $users->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                            @endfor

                            <!-- Hiển thị nút Trang kế tiếp -->
                            @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}" rel="next">&raquo;</a>
                            @else
                                <span class="disabled">&raquo;</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection