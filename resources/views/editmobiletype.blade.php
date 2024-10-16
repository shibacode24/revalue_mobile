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
										<div class="tab-title">Mobile Series</div>
									</div>
								</a>
							</li>
							<!-- <li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
										</div>
										<div class="tab-title">Mobile Model</div>
									</div>
								</a>
							</li>
                            
							 -->
						</ul>
						
						<div class="tab-content py-3">
							<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
								<form class="row g-2" method="POST"  action="{{route('update_mobile_series')}}" enctype="multipart/form-data">
								{{csrf_field()}}
                                <input type="hidden"  name="id"  value="{{$mobile_s->id}}" >
									<div class="col-md-2">
									<label for="inputFirstName" class="form-label">Select Mobile Brand</label>
										<select class="form-select mb-3" aria-label="Default select example" name="select_mobile_brand" >
											
											<option value="">Select Mobile Brand</option>
		                                          
                                         

                                                @foreach ($mobile_type as $mobiles_series)
                                                    <option value="{{$mobiles_series->id }}"
														@if ($mobile_s->select_mobile_brand_id==$mobiles_series->id)selected @endif>
                                                        {{$mobiles_series->mobile_brand}}</option>
                                                @endforeach									</select>
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Add Mobile Series</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Add Mobile Series" name="add_mobile_series" value="{{$mobile_s->add_mobile_series}}">
									</div>

									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Mobile Series Image</label>
										<input class="form-control" id="fancy-file-upload" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png" multiple>
										<label for="inputFirstName" class="form-label">(Need 50 X 50 pixels in png format)</label><img height="50px" width="50px" src="{{asset('public')."/".$mobile_s->mobile_series_image}}" alt="">
										
									</div>
									
									<div class="col-md-2" style="padding:8px" ><br>
										<button type="submit" class="btn btn-primary px-3">update</button>
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
														<th>Brand</th> 
														<th>Series</th>
														<th>Image</th> 
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												@foreach($mobile_sub as $mobiles)
													<tr>
														<td>{{$loop->index+1}}</td>
														<td>{{$mobiles->mobile_brand}}</td>
														<td>{{$mobiles->add_mobile_series}}</td>
														<td>
															<a href="{{asset('public')."/".$mobiles->mobile_series_image}}">
																<img height="50px" width="50px"
																src="{{asset('public')."/".$mobiles->mobile_series_image}}" alt="">
															</a>
														</td>
														<td>
                                                        <a href="{{route('edit_mobile_series',$mobiles->id)}}">   
                                                        <button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
														 <a href="{{route('destroy_mobile_series',$mobiles->id)}}"> <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button></a> 
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