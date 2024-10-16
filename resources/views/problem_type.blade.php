@extends('layout')
@section('content')


<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-tabs nav-primary" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
										</div>
										<div class="tab-title">Problem Category</div>
									</div>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
										</div>
										<div class="tab-title">Sub Problem Category</div>
									</div>
								</a>
							</li>
							
						</ul>
						
						<div class="tab-content py-3">
							<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
								<form class="row g-2" method="POST" action="{{route('create_prolem_category')}}">
                                    {{csrf_field()}}
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Problem Category</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Problem Category" name="problem_category">
									</div>
		
									<div class="col-md-2" style="padding:8px" ><br>
										<button type="submit" class="btn btn-primary px-3">ADD</button>
									</div>
								</form>	<br>
								
								<hr/>
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>Sr. No.</th>
														<th>Problem Category</th>  
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach($problem_c as $pc)
													<tr>
														<td>{{$loop->index+1}}</td>
														<td>{{$pc->problem_category}}</td>
														<td>
														<a href="{{route('edit_pc',$pc->id)}}">	
														<button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
                                                        <a href="{{route('destroy_prc',$pc->id)}}"><button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button></a> 
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>							
							</div>
							
							<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
								<form class="row g-2" method="POST" action="{{route('create_sub_pc')}}">
                                    {{csrf_field()}}
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Select Problem Category</label>
										<select class="form-select mb-3" aria-label="Default select example" name="select_problem_category_id">
											<option value="">Select Category</option>
                                            @foreach($problem_c as $sproblemc)
                                            <option value="{{$sproblemc->id}}">{{$sproblemc->problem_category}}</option>
                                            @endforeach
																					</select>
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Add Sub Category</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Add Sub Category" name="add_sub_category">
									</div>
		
									<div class="col-md-2" style="padding:8px" ><br>
										<button type="submit" class="btn btn-primary px-3">ADD</button>
									</div>
								</form>	<br>
								<hr/>
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table id="example11" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>Sr. No.</th>
														<th>Problem Category</th>  
														<th>Sub Category</th>  
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach($sub_pc as $sub_pcs)
													<tr>
														<td>{{$loop->index+1}}</td>
														<td>{{$sub_pcs->problem_category}}</td>
														<td>{{$sub_pcs->add_sub_category}}</td>
														<td>
														
														<a href="{{route('edit_sub_pc',$sub_pcs->id)}}">	
														<button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
														<a href="{{route('destroy_sub_pc',$sub_pcs->id)}} <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> </a>
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
					</div>
				</div>	

				<!--end page wrapper -->
                @stop

		