@extends('client_layout')
@section('title', 'Categories')

@section('content')
    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Danh sách thể loại</h1>
                  </div>
                  </div>
              </div><!-- /.container-fluid -->
          </section>


          @if (Session::has('success'))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
                    {{ Session::get('success') }}
              </div>
          @endif

          @if (Session::has('failed'))
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
                    {{ Session::get('failed') }}
              </div>
          @endif

          <section class="content-header">
              <div class="card">
                  <div class="card-header d-flex" style="height: 65px;">
                      <a href="{{ route('categories.create') }}" class="btn btn-block btn-info" style="position: absolute;width: 150px; right: 40px;">Thêm bài đăng</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- /.card-body -->
                  <div class="card-body">
                      <table class="table table-bordered" style="text-align: center;">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Tên</th>
                                  <th>Danh mục cha</th>
                                  <th>Ngày tạo</th>
                                  <th>Thao tác</th>
                              </tr>
                          </thead>

                          <tbody>
                              @foreach ($categories as $item)
                              <tr>
                                  <td>{{$item->id}}</td>
                                  <td>{{$item->name}}</td>
                                  <td>{{$item->parent_id}}</td>
                                  <td>{{$item->created_at}}</td>
                                  <td>
                                    <div class="btn-group">
                                        <form action="{{ url('/categories', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input class="btn btn-warning" type="submit" value="Sửa" />
                                        </form>

                                        <form action="{{ url('/categories', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger" type="submit" value="Xóa" />
                                        </form>
                                    </div>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  <!-- /.card-footer -->
                  <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                          <li class="page-item active"><a class="page-link" href="?page=1">1</a></li>
                      </ul>
                  </div>
              </div>
          <!-- /.card -->
          </section>
          <!-- /.content -->
      </div>
    <!-- /.content-wrapper -->
@endsection