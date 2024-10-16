@extends('layout')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="card-title d-flex align-items-center">
								
									<h5 class="mb-0 text-primary">Add Instant Service</h5>
								</div>
								<hr>
								<form class="row g-2" method="post" action="{{route('update_services')}}" enctype="multipart/form-data" >
                                    {{csrf_field()}}

                                    <input type="hidden"  name="id"  value="{{$services_edit->id}}" >
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Instant Service Name</label>
										<input type="text" class="form-control" name="instant_service" placeholder="Instant Service Name" value="{{$services_edit->instant_service_name}}">
									</div>
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Add icon</label>
										<input class="form-control" id="fancy-file-upload" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png" multiple>
										<label for="inputFirstName" class="form-label">(Size of image must be 200 x 200 pixels)</label><img height="50px" width="50px" src="{{asset('public')."/".$services_edit->add_iocn}}" alt="">
										
									</div>
									<div class="col-4">
										<label for="inputAddress" class="form-label">Description</label>
										<textarea class="form-control" name="description"  placeholder="Description" rows="2">{{$services_edit->description}}</textarea>
									</div>
			
									<div class="col-md-2" style="padding:8px" ><br>
										<button type="submit" class="btn btn-primary px-3">Update</button>
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
										<th>Service</th>  
										<th>Thumbnail</th> 
										<th>Description</th> 
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($services as $service)
									<tr>
										<td>{{$loop->index+1}}</td>
                                        <td>{{$service->instant_service_name}}</td>
										<td><a href="{{asset('public')."/".$service->add_iocn}}">
																<img height="50px" width="50px" src="{{asset('public')."/".$service->add_iocn}}" alt="" /></a>
										</td>
                                        <td>{{$service->description}}</td>

										<td>
										<a href="{{route('edit_services',$service->id)}}">
											<button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> </a>
											<a href="{{route('destroy_services',$service->id)}}">
											<button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> </a>
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