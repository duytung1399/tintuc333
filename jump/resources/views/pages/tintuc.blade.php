 @extends('layout1.index')

 @section('content')

 <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                     <a href="#">Duy Tùng_ADMIN</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="update/tintuc/{{$tintuc->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on:{{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                	
                	{!!$tintuc->NoiDung!!}
                </p>

                <hr>
                <!-- Blog Comments -->

                <!-- Comments Form -->
                
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

               
                         <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <small></small>
                            
                            </h4>
                  				
                    	</div>
                        </div>
      
                

            	</div>
               

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                    	@foreach($tinlienquan as $tt)

                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="update/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="#"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p>{{$tt->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->

					@endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                    	@foreach($tinnoibat as $tt)

                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="update/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="#"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 5px;">{{$tt->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach


                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    @endsection