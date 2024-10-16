@extends('layout')
@section('content')



	<div class="page-wrapper">
		<div class="page-content">
			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
				<div class="col">
					<div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Number of Users</p>
									{{-- <h4 class="my-1">100</h4> --}}
									@php
									$count = DB::table('users')->count();
									echo '<h3>' . $count . '</h3>';
									@endphp
								
								</div>
								<div class="text-primary ms-auto font-35"><i class='bx bx-user-circle'></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Number of complaint </p>
									{{-- <h4 class="my-1">80</h4> --}}
									<?php
									$count = DB::table('complaints')->count();
									echo '<h3>' . $count . '</h3>';
									?>
								</div>
								<div class="text-warning ms-auto font-35"><i class='bx bx-comment-detail'></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Solve complaint </p>
									{{-- <h4 class="my-1">70</h4> --}}
									<?php
									$count = DB::table('complaints')
									->where('status', 'Completed')
									->count();

									echo '<h3>' . $count . '</h3>';
									?>
								</div>
								<div class="text-success ms-auto font-35"><i class='bx bx-comment-check'></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Cancelled complaint </p>
									{{-- <h4 class="my-1">10</h4> --}}
									<?php
									$count = DB::table('complaints')
									->where('status', 'Cancel')
									->count();

									echo '<h3>' . $count . '</h3>';
									?>
								</div>
								<div class="text-danger ms-auto font-35"><i class='bx bx-comment-x'></i>
								</div>
							</div>
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
			
			<div class="col">
				
				<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								{{-- <form method="POST" action="{{route('modal_dasboard')}}">
									@csrf --}}
									{{-- <form action="{{ route('destroy_technicine', $dash->id) }}" method="POST">
									@csrf
									@method('delete') --}}
								<h5 class="modal-title">Technician Registration</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<form action="{{ route('assign_technician') }}"
										method="post">
								<div class="modal-body">
									<div class="card-body p-2">
										
										@csrf
										<input type="hidden" id="complaint_id_input"
											name="id">
												
											<div class="col-md-3">
												<label for="inputFirstName" class="form-label">Assigned work to Technician</label>
												<input type="hidden" name="dash_id" id="dashID" value="">
												<select class="form-select mb-3" aria-label="Default select example" name="assigned_to_tech" id="assignTech">
													<option selected>Select Technician</option>
													@foreach ($tech as $dasboards)
													<option value="{{$dasboards->id }}">
														{{$dasboards->first_name}}</option>
												@endforeach			
												</select>
											</div>
											{{-- @if ($dasboardedit->assigned_to_tech_id==$dasboards->id)selected @endif> --}}

											<div class="col-md-3">
												<label class="form-label">Date and Time</label>
												<input class="result form-control" type="datetime-local" id="date-time" placeholder="Date Picker..." name="assignedwork_date" id="assignDate" >
											</div>

												
											<div class="col-md-3">
												<label class="form-label">Status</label>
												{{-- <input class="result form-control" type="text" id="date-time" placeholder="status" name="status" id="Status" > --}}

												<select class="form-select mb-3" aria-label="Default select example" name="status">
													<option selected>Select status</option>
													<option>raised</option>
													<option>assigned</option>
													<option>completed</option>
													<option>cancelled</option>
													
												</select>
											</div>
											
									</div>
								</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		
			
			<hr/>

			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>User Name</th>
									<th>User Number</th>
									<th>Complaint</th>
									<th>Date of Complaint</th>
									<th>Assigned To Tech</th>
									<th>Assignedwork Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								{{-- @if(isset($dasboard) && !empty($dasboard)) --}}
								@foreach ($dasboard as $dash)
									
								<tr>
									<td>{{$loop->index+1}}</td>
									
									<td>{{$dash->name}}</td>
									<td>{{$dash->mobile_no}}</td>
									<td>{{$dash->problem_category}}</td>
									<td>{{$dash->date}}</td>
									<td>{{$dash->first_name}}</td>
									<td>{{$dash->assignedwork_date}}</td>	
									<td>{{$dash->status}}</td>
									{{-- <td>{{$dash->remark}}</td>
									<td>{{$dash->}}</td>
									<td>{{$dash->status}}</td> --}}
									<td>

										<button type="button"  complaint_id="{{ $dash->id }}" class="btn1 btn-outline-success editbtn" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" ><i class='bx bx-edit-alt me-0'></i></button>
										<a href="{{route('destroy_dashboard',$dash->id)}}">
										 <button type="button " class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button></a>
									</td>
								</tr>
								@endforeach
								{{-- @endif --}}
							</tbody>
							
						</table>
					</div>
				</div>
			</div>
		
		</div>
	</div>
	<!--end page wrapper -->
	@stop
	@section('js')
	{{-- <script>
		$(document).ready(function(){
			 $(document).on('click','.editbtn',function(){
				var dash_id = $(this).val();
				$.ajax({
				   type:"GET",
				   url:"/edit_modal/"+dash_id,
				   success:function(response){
					  $('#dashID').val(response.dash_id);
					  $('#assignTech').val(response.assigned_to_tech_id.assigned_to_tech);
					  $('#assignDate').val(response.assignedwork_date.assignedwork_date);
					  $('#Status').val(response.status.status);
					  $('#dashID').val(dash_id);
				   }
				});
			 });
		  });


		  
	</script> --}}

	<script>
		 $(document).on("click", ".editbtn", function() {
                $("#complaint_id_input").val($(this).attr('complaint_id'))//id ko hidden pe set


            });
	</script>
	@stop