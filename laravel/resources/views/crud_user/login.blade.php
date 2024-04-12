@extends('dashboard')

@section('content')
<<<<<<< HEAD
<<<<<<< HEAD
<style>
    a{
  text-decoration: none;
    padding: 5px;
  
}
.box{
    margin-top: 50px;
}

.box .icon{
    text-align: center;
}
.icon{
border-radius: 100px;
border: solid 2px black;

}
.formlogin {
   
    width: 600px;
    height: 500px;
    border: 2px solid black;
   margin: 50px auto;
   border-radius: 5px;

}
.username{
    display: flex;
    margin-bottom: 50px;
}
.PassWold{display: flex;
    margin-bottom: 20px;
}
.ghinho{
    display: flex;
    margin-bottom: 10px;
   
}
.ghinhopass{
margin: auto 180px;
}
.row{
    margin-top: 20px;
}
.supcua{
 
}
.userpass{

    margin-bottom: 50px;
}
.contaitable{
    width: 800px;
    height: 600px;
    border: 2px solid black;

}
</style>
    <div class="container">
        <form method="POST" action="{{ route('user.authUser') }}">
            @csrf
            <div class="formlogin">
                <div class="lable" style="text-align:center ;padding-bottom: 100px; padding-top: 50px;">
                    <h1>Màn Hình Đăng Nhập</h1>
                </div>
                <div class="container userpass">
                    <div class="row">
                        <div class="col-4">
                            <h3 style="margin: auto 40px;">Email</h3>
                        </div>
                        <div class="col-6">
                            <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h3 style="margin: auto 40px;">Mật Khẩu</h3>
                        </div>
                        <div class="col-6">
                            <input type="password" placeholder="Mật khẩu" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-2">
                        </div>
                        <input type="checkbox" name="remember" style="height: 20px;width: 30px;;margin: auto auto;">
                        <div class="col-6">
                            <h5>Lưu dữ liệu</h5>
                        </div>
                    </div>
                </div>
                <div class="subcua">
                    <div class="container ">
                        <div class="row">
                            <div class="col-5">
                            </div>
                            <div class="col-4">
                                <a href="http://">Quên Mật Khẩu</a>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-sm bg-primary" style="color: black;">Đăng Nhập</button>
                            </div>
=======
=======
>>>>>>> 6-view_delete
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Đăng nhập</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.authUser') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                           autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="mật khẩu" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Lưu dữ liệu
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Đăng nhập</button>
                                </div>
                            </form>
<<<<<<< HEAD
>>>>>>> 3-listOfUser
=======
>>>>>>> 6-view_delete
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
<<<<<<< HEAD
        </form>
        
    </div>
@endsection
=======
        </div>
    </main>
@endsection
>>>>>>> 3-listOfUser
=======
        </div>
    </main>
@endsection
>>>>>>> 6-view_delete
