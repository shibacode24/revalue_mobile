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
								<form class="row g-3" method="POST" action="{{route('crete_maintenance')}}" enctype="multipart/form-data" >
                                {{csrf_field()}}
									<div class="col-md-5">
										<label for="inputFirstName" class="form-label">Reason For Maintenance</label>
										<input class="form-control"  placeholder="Reason For Maintenance" name="reason_maintenance"> 
									</div>


									<div class="col-md-5">
										<label for="inputFirstName" class="form-label">Select Status</label>
										<select class="form-select mb-3" aria-label="Default select example" name="status">
											<option selected>Select</option>
											<option value="Activate">Activate</option>
											<option value="Deactivate">Deactivate</option>
										</select>
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
                                        <th>Reason for Maintenance</th> 
										<th>Status</th>
                                   
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($mai as $mainten)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$mainten->reason_maintenance}}</td>
														<td>{{$mainten->status}}</td>
                                                       
														<td>
														<a href="{{route('edit_maintenance',$mainten->id)}}">	
														<button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
														<a href="{{route('destroy_maintenance',$mainten->id)}}">
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