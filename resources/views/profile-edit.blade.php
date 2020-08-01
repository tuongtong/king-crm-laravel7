@extends('master')
@section('head')
<title>KING | Thông tin cá nhân</title>
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÔNG TIN CÁ NHÂN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa thông tin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- general form elements -->
      @if (session('success'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i> Thành công!</h5>
            {{ session('success') }}
          </div>
        </div>
      </div>
      @endif
              @if($errors->any())
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fa fa-warning"></i> Có gì đó sai sai!</h5>
                {{$errors->first()}}
              </div>
              @endif
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nhập thông tin khách hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('staff.profile.edit.post')}}" method="post">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input name="phone" pattern="[0-9]{10}" class="form-control" id="phone" value="{{UserInfo()->phone}}" autofocus required>
                  </div>
                  <div class="form-group">
                    <label for="name">Họ và tên:</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{UserInfo()->name}}" required>
                  </div>
                  <div class="form-group">
                    <label for="birthday">Ngày sinh:</label>
                    <input name="birthday" type="date" class="form-control" id="inputNgaysinh" value="{{UserInfo()->birthday}}">
                  </div>
                  <div class="form-group">
                    <label for="password">Mật khẩu mới:</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="(Bỏ trống nếu không thay đổi)">
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Nhập lại mật khẩu:</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="(Bỏ trống nếu không thay đổi)">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                  <a onclick="history.go(-1);" class="btn">Quay lại</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop

@section('script')
@stop