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
										<th>Mobile Brand</th>  
										<th>Model</th>
                                        <th>Pick up address</th>
										<th>Pick up date</th>  
										<th>Mobile</th>
                                        <th>Status</th>
										
										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                                @foreach($donate as $sales)
                                                     <tr>
                                                       <td>{{$loop->index+1}}</td>
                                                       <td>{{$sales->mobile_brand}}</td>
                                                      
                                                       <td>{{$sales->model}}</td>
                                                       <td>{{$sales->pick_up_address}}</td>
                                                       <td>{{$sales->pick_up_date}}</td>
                                                       <td>{{$sales->mobile}}</td>
                                                       <td>{{$sales->status}}</td>
                                                       
                                                      
                                                        <td>
                                                            <a href="{{route('donate_destroy',$sales->id)}}"> 
                                                                <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> </a>
</a>
                                                        </td>
                                                    </tr>
                                                  
                                                    @endforeach    
                                                   
                                                </tbody>
							</table>
						</div>

					</div>
				</div>
              
@stop
@section('js')

@stop
