@extends('layout1.index')

@section('content')
    <!-- Page Content -->
    <div class="container">
            <link href="awesome/awesome1/css/all.css" rel="stylesheet">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div style="background-color:yellow" class="panel panel-default">
				  	<div   class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
				    	<form action="dangnhap" method="post">

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
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" placeholder="Password"  name="password">
							</div>
							<br>
							<center> <button  type="submit" class="btn btn-default">Đăng nhập
                            </button ></center>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

 @endsection
