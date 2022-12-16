@extends('client_layout')
@section('title', 'Posts')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm bài đăng</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ url('posts') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title">Thêm bài đăng</h3>
                        </div>

                        <form method="post" action="{{ route('posts.store') }}">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tiêu đề </label>
                                    <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="Nhập vào tiêu đê bài đăng">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Nội dung </label>
                                    <input type="text" class="form-control" value="{{old('content')}}" name="content"  placeholder="Nhập vào nội dung bài đăng">
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword">ID người dùng </label>
                                    <input type="text" class="form-control" value="{{old('password')}}" name="user_id"  placeholder="Nhập ID ngươi dùng">
                                </div>

                                <div class="form-group">
                                    <label for="inputCategoryId">Tên thể loại </label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $category)
                                            <option>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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