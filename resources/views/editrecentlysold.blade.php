@extends('layout')
@section('content')

<!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Recently Sold</h5>
                            </div>
                            <hr>
                            <form class="row g-3" method="POST" action="{{route('update_sold')}}" enctype="multipart/form-data">
                                @csrf
                            <input type="hidden" name="id" value="{{$editsold->id}}">
                                <div class="col-md-4">
                                    <label for="inputLastName2" class="form-label">Device Name</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="device_name">
                                        <option value="">Select Device Name</option>
                                        @foreach($sale as $name)
                                        <option value="{{$name->id}}" @if($editsold->device_name_id==$name->id)selected @endif>{{$name->device_name}}</option>
                                        @endforeach
                                                                                </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputLastName1" class="form-label">Device Config</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="device_config">
                                        <option value="">Select Config</option>
                                        @foreach($sale as $config)
                                        <option value="{{$config->id}}" @if($editsold->device_config_id==$config->id) selected @endif>{{$config->device_config}}</option>
                                        @endforeach
                                                                                </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="inputLastName2" class="form-label">Price</label>
                                                                       <input class="form-control"  value="{{$editsold->price}}" type="text" name="price" placeholder="price">

                                </div>
								
								 <div class="col-md-4">
                                    <label for="inputLastName2" class="form-label">Storage</label>
                                    <input class="form-control"  type="text" value="{{$editsold->storage}}" name="storage" placeholder="Storage">
                                </div>
                                <div class="col-4">
                                    <label for="inputPhoneNo" class="form-label">Image</label>
                                   
                                    <input class="form-control" id="fancy-file-upload" type="file" name="images" accept=".jpg, .png, image/jpeg, image/png" multiple>
                                    <img height="50px" width="50px" src="{{asset('public')."/".$editsold->image}}" alt="">
                                    
                                </div>
                             
                              
                                
                                <div class="col-2" style="margin-top: 45px">
                                    <button type="submit" class="btn btn-primary px-3">Add</button>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="table-responsive ">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Device Name</th> 
                                        <th>Device Config</th> 
                                        <th>Price </th>
                                        <th>Storage </th>
                                        <th>Image</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sold as $tech)
                                        
                                  
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$tech->device_name}}</td>
                                        <td>{{$tech->device_config}}</td>
                                        <td>{{$tech->price}}</td>
                                        <td>{{$tech->storage}}</td>
                                        <td>
                                        <a href="{{asset('public')."/".$tech->image}}">
																<img height="50px" width="50px" src="{{asset('public')."/".$tech->image}}" alt="" /></a>
                                                            
                                        </td>
                                        
                                         <td>  

                                         
                                            <a href="{{route('edit_sold',$tech->id)}}">
                                            <button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> </a>
                                            <a href="{{route('destroy_sold',$tech->id)}}">
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
    </div>
    <!--end page wrapper -->
    @stop
