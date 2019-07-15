    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->                
                </div>
               <b> <a class="navbar-brand" href="trangchu">TRANG CHỦ</a></b> 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới Thiệu</a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/Tungxautrai123" target="_blank">Liên Hệ</a>
                    </li>
                </ul>

                <form action="timkiem" method="get" class="navbar-form navbar-left" role="search">
                    {{csrf_field()}}
			        <div class="form-group">
			          <input type="text" class="form-control" name="tukhoa" placeholder="Tìm Kiếm">
			        </div>
			        <button type="submit" class="btn btn-default">Tìm Kiếm</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                 
                    <li>
                        <a>
                            <span class ="glyphicon glyphicon-user"></span></a>
                    </li>

                    <li>
                        <a href="dangxuat">Đăng Xuất</a>
                    </li>
                   

                    <li>
                        <a href="dangky">Đăng Ký</a>
                    </li>
                    <li>
                        <a href="dangnhap">Đăng Nhập</a>
                    </li>
                                  
                </ul>
            </div>        
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>