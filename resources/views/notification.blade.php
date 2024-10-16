@extends('layout')
@section('content')

	<!--start page wrapper -->
    <div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form class="row g-3" method="POST" action="{{route('create_notification')}}">
                                    {{csrf_field()}}
									<div class="col-md-2">
										<label for="inputFirstName" class="form-label">Title</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Title" name="title">
									</div>
									<div class="col-md-2">
										<label class="form-label">Current Date</label>
											<input class="result form-control" type="date" id="date" placeholder="Date Picker..." name="current_date">
									</div>
									<div class="col-4">
										<label for="inputAddress" class="form-label">Description</label>
										<textarea class="form-control" id="inputAddress" placeholder="Description" rows="2" name="description"></textarea>
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
				
			
				<!-- <h6 class="mb-0 text-uppercase">Notification DataTable</h6> -->
				<hr/>
				
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Title</th>
										<th>Date</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($notifi as $notific)
									<tr>
										<td>{{$loop->index+1}}</td>
										<td>{{$notific->title}}</td>
										<td>{{$notific->current_date}}</td>
										<td>{{$notific->description}}</td>
										<td>
										<a href="{{route('edit_notification',$notific->id)}}">
											<button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
                                       <a href="{{route('destroy_notification',$notific->id)}}"><button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> </a> 
										</td>								
									</tr>
									
									@endforeach
							</table>
						</div>
					</div>
				</div>

				
			</div>
		</div>
		<!--end page wrapper -->
        @stop