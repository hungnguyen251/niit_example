@extends('client_layout')
@section('title', 'Categories')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin thể loại</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="category">
                            <a href="{{ url('categories') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title">Sửa thông tin</h3>
                        </div>

                        <form method="post" action="{{ route('categories.update', [$category->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên </label>
                                    <input type="text" class="form-control" value="{{ $category->name }}" name="name" placeholder="Nhập vào tiêu đề bài đăng">
                                </div>

                                <div class="form-group">
                                    <label for="inputParentId">Danh mục cha </label>
                                    <select class="form-control" name="parent_id">
                                        @foreach ($parentId as $items)
                                            <option {{ $category->parent_id == $items->parent_id ? 'selected' : ''}}>{{ $items->parent_id }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" class="form-control" value="{{ date('Y-m-d H:i:s') }}" name="updated_at"  placeholder="">
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