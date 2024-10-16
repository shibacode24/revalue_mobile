@extends('layout')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-8 mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="card-title d-flex align-items-center">
							
									<h5 class="mb-0 text-primary">Mobile Brand</h5>
								</div>
								<hr>
								<form class="row g-3" method="POST" action="{{route('create_mobile')}}" enctype="multipart/form-data" >
                                {{csrf_field()}}
									<div class="col-md-5">
										<label for="inputFirstName" class="form-label">Brand Name</label>
										<input class="form-control" id="inputFirstName" placeholder="Brand Name" name="mobile_brand"> 
									</div>


									<div class="col-md-5">
										<label for="inputFirstName" class="form-label">Select Series</label>
										<select class="form-select mb-3" aria-label="Default select example" name="status">
											<option selected>Select Series</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>

                                    <div class="col-md-5">
										<label for="inputFirstName" class="form-label">Brand Image</label>
										<input class="form-control" id="fancy-file-upload" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png" multiple>
										<label for="inputFirstName" class="form-label">(Need 50 X 50 pixels in png format)</label>
									</div>
		
									<div class="col-md-3" style="padding:8px" ><br>
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
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Brand</th> 
										<th>Status</th>
                                        <th>Brand Image</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($mobile_type as $mobile_types)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$mobile_types->mobile_brand}}</td>
														<td>{{$mobile_types->status}}</td>
                                                        <td>
															<a href="{{asset('public')."/".$mobile_types->brand_image}}"> 
																<img height="50px" width="50px" src="{{asset('public')."/".$mobile_types->brand_image}}" alt="" /></a>
                                                            
                                                        </td>
														<td>
														<a href="{{route('edit_mobile',$mobile_types->id)}}">	
														<button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
														<a href="{{route('destroy_mobile',$mobile_types->id)}}">
														 <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button></a> 
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