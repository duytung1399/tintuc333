  @extends('admin.layout.index')

  @section('content')


  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Users
                            <small>{{$users->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/users/sua/{{$users->id}}" method="POST">

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
                                <input class="form-control" name="name" placeholder="Vui lòng nhập tên " value="{{$users->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" readonly="true" name="email" placeholder="Vui Lòng nhập email"
                                value="{{$users->email}}" readonly="" />

                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePassword" name="changePassword">

                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Vui lòng nhập mật khẩu"
                                disabled="" 
                                 />
                            </div>
                             <div class="form-group">
                                <label> Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Vui lòng nhập lại mật khẩu"
                                disabled="" 
                                 />
                            </div>
                            <div class="form-group">
                                <label>Quyền Users</label>
                                  <label class="radio-inline">
                                    <input name="rdoStatus" value="0"
                                        @if($users->quyen==0)
                                        {{"checked"}}
                                        @endif

                                     type="radio">Normal
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" 
                                    @if($users->quyen==1)
                                        {{"checked"}}
                                    @endif type="radio">Admin
                                </label>
                              
                            </div>
                            <button type="submit" class="btn btn-default">sửa</button>
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



@section('script')
<script>
    $(document).ready(function(){
        $("#changePassword").change(function(){
            if($(this).is(":checked"))
            {
                $(".password").removeAttr('disabled');
            }
            else
            {
                $(".password").arttr('disabled','');

            }
        });
    });
</script>
@endsection