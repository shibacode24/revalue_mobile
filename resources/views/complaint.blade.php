@extends('layout')
@section('content')

<div class="page-wrapper">
			<div class="page-content">
				<div class="card">
					<div class="card-body">
                        
                    
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>model_name</th>  
										<th>problem_category</th>
                                        <th>add_sub_category</th>
										<th>details</th>  
										<th>date</th>
                                        <th>time</th>
										<th>status</th>  
										<th>city_name</th>
                                        <th>first_name</th>
										<th>assignedwork_date</th>  
										<th>remark</th>
                                        <th>reason</th>
										{{-- <th>Last Name</th>  
										<th>Phone Number</th>
                                        <th>Address</th>
										<th>Device Photo</th>  
										<th>Pickup Date</th>
                                        <th>Pincode</th>
										<th>State</th>  
										<th>City</th>
										<th>Email</th>   --}}
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                                @foreach($complaint as $sales)
                                                     <tr>
                                                       <td>{{$loop->index+1}}</td>
                                                       <td>{{$sales->model_name}}</td>
                                                      
                                                       <td>{{$sales->problem_category}}</td>
                                                       <td>{{$sales->add_sub_category}}</td>
                                                       <td>{{$sales->details}}</td>
                                                       <td>{{$sales->date}}</td>
                                                       <td>{{$sales->time}}</td>
                                                       <td>{{$sales->status}}</td>
                                                       <td>{{$sales->city_name}}</td>
                                                       <td>{{$sales->first_name}}</td>
                                                       <td>{{$sales->assignedwork_date}}</td>
                                                       <td>{{$sales->remark}}</td>
                                                       <td>{{$sales->reason}}</td>
                                                       {{-- <td>{{$sales->Phone_number}}</td>
                                                       <td>{{$sales->Address}}</td> --}}
                                                       {{-- <td> --}}

                                                       {{-- <a href="{{asset('public')."/".$sales->device_photo}}">
																<img height="50px" width="50px" src="{{asset('public')."/".$sales->device_photo}}" alt="" /></a>
                                                            
                                                       </td>
                                                       <td>{{$sales->pickup_date}}</td>
                                                       <td>{{$sales->pincode}}</td>
                                                       <td>{{$sales->state}}</td>
                                                       <td>{{$sales->city}}</td>
                                                       <td>{{$sales->email}}</td> --}}

                                                        <td>
                                                            {{-- <button type="button"  class="btn1 btn-outline-success editvend" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="{{$sales->id}}" >Assign Vendor</button>

                                                            <button type="button"  class="btn1 btn-outline-success editbtn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$sales->id}}">status</button> --}}
                                                        {{-- <a href="{{route('destroy_sale',$sales->id)}}">	 --}}
                                                                <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> 
</a>
                                                        </td>
                                                    </tr>
                                                  
                                                    @endforeach    
                                                   
                                                </tbody>
							</table>
						</div>

					</div>
				</div>
                <div class="col">
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            
                                <div class="modal-body">
                                    <form action="{{route('sales_create')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden"  name="id" id="sale_id" >
                                        {{-- <input type="text" > --}}
                                    <label for="inputFirstName" class="form-label">Select Status</label>
										<select class="form-select mb-3" aria-label="Default select example" name="status">
											<option selected>Select Status</option>
											<option value="Completed">Completed</option>
                                            <option value="Cancel">Cancel</option>
										</select>
                                </div>
                           
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col">
                    
                    <!-- Modal -->
                    {{-- <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            
                                <div class="modal-body">
                                    <form action="{{route('update_vendor')}}" method="post">
                                        @csrf
                                        <input type="hidden" id="vendor" name="id">

                                    <label for="inputFirstName" class="form-label">Select vendor</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="select_vendor" id="">
										<option value="">Select Category</option>
		                                             
										
                                        @foreach ($selectvendor as $vendorr)
                                                    <option value="{{$vendorr->id}}">
                                                        {{$vendorr->name}}</option>
                                                @endforeach		

                                               								</select>
                                </div>
                           
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div> --}}

			</div>
		</div>
		<!--end page wrapper -->
		
@stop
@section('js')
<script>
$(".editbtn").on('click',function(){
    // alert($(this).attr('id'));
    $("#sale_id").val($(this).attr('id'));


});
$(".editvend").on('click',function(){
    // alert($(this).attr('id'));
    $("#vendor").val($(this).attr('id'));

    
});

</script>
@stop
