@extends('layout')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-5 mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="card-title d-flex align-items-center">
							
									<h5 class="mb-0 text-primary">City</h5>
								</div>
								<hr>
								<form class="row g-3" method="POST" action="{{route('update-city')}}">
                                {{csrf_field()}}

								<input type="hidden"  name="id"  value="{{$cityedit->id}}">
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">City Name</label>
										<input type="text" class="form-control" name="city" value="{{$cityedit->city_name}}" placeholder="City Name"> 
									</div>
		
									<div class="col-md-3" style="padding:8px" ><br>
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
				
			

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>City</th>  
										<th>Action</th>
									</tr>
								</thead>
                                <tbody>
                                                    @foreach($city as $citys)
                                                     <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$citys->city_name}}</td>
                                                        <td>
                                                       
                                                        <a href="{{route('edit-city',$citys->id)}}">
                                                        <button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
                                                        <a href="{{route('destroy-city',$citys->id)}}"> <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> </a>
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