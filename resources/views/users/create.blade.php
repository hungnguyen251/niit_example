@extends('client_layout')
@section('title', 'Users')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm người dùng</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ url('users') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm người dùng</h3>
                        </div>

                        <form method="post" action="{{ route('users.store') }}">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên </label>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Nhập vào tên người dùng">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email </label>
                                    <input type="text" class="form-control" value="{{old('email')}}" name="email"  placeholder="Nhập vào email người dùng">
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword">Mật khẩu </label>
                                    <input type="password" class="form-control" value="{{old('password')}}" name="password"  placeholder="Nhập vào mật khẩu">
                                </div>
                                <input type="hidden" class="form-control" value="{{ date('Y-m-d H:i:s') }}" name="updated_at"  placeholder="">
                                <input type="hidden" class="form-control" value="{{ date('Y-m-d H:i:s') }}" name="created_at"  placeholder="">
                            </div>

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection