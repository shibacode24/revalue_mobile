@extends('layout')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card ">
							<div class="card-body ">
								<div class="card-title d-flex align-items-center">
									<h5 class="mb-0 text-primary">Slider</h5>
								</div>
								<hr>
								<form class="row g-3" method="POST" action="{{route('create_slider')}}" enctype="multipart/form-data" >
									{{csrf_field()}}
                                <div class="col-md-7">
										<label for="inputFirstName" class="form-label">Image Thumbnail</label>
										<input class="form-control" id="fancy-file-upload" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png" multiple>
										<label for="inputFirstName" class="form-label">(Need in png format with text 600 X 350 pixels)</label>
									</div>
								   
			
									<div class="col-md-2" style="padding:8px" ><br>
										<button type="submit" class="btn btn-primary px-3">ADD</button>
									</div>
								</form>
							</div>
		
						</div>
					</div>
				</div>
				

				
				<!--end page wrapper -->
				<!--start overlay-->
				<div class="overlay toggle-icon"></div>
				<!--end overlay-->
				<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
				<!--End Back To Top Button-->
				
			
				<!-- <h6 class="mb-0 text-uppercase">DataTable</h6> -->
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Slider</th>  
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                                @foreach($slider as $sliders)
                                                     <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                       
                                                        <td>
														<a href="{{asset('public')."/".$sliders->upload_image}}">
																<img height="50px" width="50px" src="{{asset('public')."/".$sliders->upload_image}}" alt="" /></a>
                                                            
                                                        </td>
                                                      
                                                        <td>
                                                         
                                                            <a href="{{route('destroy_slider',$sliders->id)}}"><button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> </a>                                      
                                                        </td>
                                                    </tr>
                                                  
                                                    @endforeach    
                                                   
                                                </tbody>
							</table>
						</div>
					</div>
				</div>
			
			</div>
		</div>
		<!--end page wrapper -->
		
@stop