  @extends('admin.layout.index')

  @section('content')


  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Users
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/users/them" method="POST">

                              @if(isset($errors) && count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach     
                                </div>
                             @endif

                             @if(session('thongbao'))
                                 <div class="alert alert-success">
                                    {{session('thongbao')}}
                                 </div>
                            @endif
                        
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input class="form-control" name="name" placeholder="Vui lòng nhập tên " />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Vui Lòng nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Vui lòng nhập mật khẩu" />
                            </div>
                             <div class="form-group">
                                <label>Again Password</label>
                                <input type="passwor" class="form-control" name="passwordAgain" placeholder="Vui lòng nhập lại mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Quyền Users</label>
                                  <label class="radio-inline">
                                    <input name="rdoStatus" value="2" checked="" type="radio">Normal
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1"  type="radio">Admin
                                </label>
                              
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


@endsection
