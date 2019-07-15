@extends('layout1.index')

@section('content')

<!-- Page Content -->
    <div class="container">

    	@include('layout1.slide')
        <div class="space20"></div>

        <div class="row main-left">
	@include('layout1.menu')
            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		@foreach($theloai as $tl)
	            		@if(count($tl->loaitin)>0)
	            		<!-- item -->
					    <div class="row-item row">
		                	<h3>
		                		<a href="category.html">{{$tl->Ten}}</a> | 	
		                		@foreach($tl->loaitin as $lt)
		                		<small>
		                		<a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a>/	       
		                		</small>
		                		@endforeach
		                	</h3>

		                	<?php 
								$data=$tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
								$tin1=$data->shift();		                	


		                	?> 

		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">
			                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
			                            <img class="img-responsive" src="update/tintuc/{{$tin1['Hinh']}}" alt="">
			                        </a>
			                    </div>

			                    <div class="col-md-7">
			                        <h3>{{$tin1['TieuDe']}}</h3>
			                        <p>{{$tin1['TomTat']}}</p>
			                        <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem Chi Tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>

		                	</div>
		                    

							<div class="col-md-4">
								@foreach($data->all() as $tintuc)
								<a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{$tintuc['TieuDe']}}
									</h4>
								</a>
								@endforeach

							
							</div>
							
							<div class="break"></div>
		                </div>
		                <!-- end item -->
		                <!-- item -->
		                @endif
		                @endforeach
					
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <footer>
    	<div class="container" >
    	
    		<div class="row">
    		</div>
    		<div class="col-md-12" ></div>
    		<div class="=col-12-12 col-sm col-md-6"><img src="update/slide/3.jpg" alt=""></div>
    		

    		<div class="text-right" class="=col-12-12 col-sm col-md-6"><img src="update/slide/3.jpg" alt=""></div></div>
    		<div  style="margin: 80px;" class="text-center"><h1>LARAVEL TIN TUC</h1>
			    			
				    		</div>

    		<div class="col-md-12">..</div>			
		    <div class="f-sicon">
			<style></style>
			    	
    
    		
    		</div>

			
    	</div>
    </footer>

    <div class="middle">
    	<a href="#">
    		<i class="fab-fa-facebook-f"></i>
    	</a>
    	<a href="#">
    		<i class="fab-fa-twitter"></i>
    	</a>
    	<a href="#">
    		<i class="fab-fa-facebook-f"></i>
    	</a>
    	<a href="#">
    		<i class="fab-fa-facebook-f"></i>
    	</a>


    </div>



    @endsection