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
                                <h5 class="mb-0 text-primary">Technician Vendor</h5>
                            </div>
                            <hr>
                            <form class="row g-3" method="POST" action="{{route('create_teachvendor')}}">
                                @csrf
                            
                                <div class="col-md-3">
                                    <label for="inputLastName2" class="form-label">Name</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                        <input type="text" class="form-control border-start-0" placeholder="Name" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputLastName1" class="form-label">Address</label>
                                        <input type="text" class="form-control border-start-0"  placeholder="Address" name="address" />
                                    
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="inputLastName2" class="form-label">Contact Number</label>
                                    <div class="input-group"><span class="input-group-text bg-transparent"><i class="fadeIn animated bx bx-phone"></i></span>
                                        <input type="text" class="form-control border-start-0" placeholder="Contact Number" name="contact_no" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="inputPhoneNo" class="form-label">User Name</label>
                                    <div class="input-group"><span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                        <input type="text" class="form-control border-start-0" id="inputPhoneNo" placeholder="User Name" name="username"/>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="inputEmailAddress" class="form-label">Password</label>
                                  
                                        <input type="text" class="form-control border-start-0" id="inputEmailAddress" placeholder="Password" name="password"/>
                                   
                                </div>
                              
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Select City</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="city">
                                        <option value="">Select city</option>
                                        @foreach($city as $citys)
                                        <option value="{{$citys->id}}">{{$citys->city_name}}</option>
                                        @endforeach
                                                                                </select>
                                </div>
                                
                                <div class="col-3" style="margin-top: 48px">
                                    <button type="submit" class="btn btn-danger px-5">Add</button>
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
                                        <th>Name</th> 
                                        <th>Address</th> 
                                        <th>Contact No</th>
                                        <th>User Name</th>
                                        <th>Password</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($techvend as $tech)
                                        
                                  
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$tech->name}}</td>
                                        <td>{{$tech->address}}</td>
                                        <td>{{$tech->contact_no}}</td>
                                        <td>{{$tech->username}}</td>
                                        <td>{{$tech->password}}</td>
                                        <td>{{$tech->city_name}}</td>
                                         <td>  
{{--                                             
                                            <a href="{{ url('/status', $tech->id) }}"
                                                class="switch">
                                                <label class="switch label_change"
                                                    id="{{ $tech->id }}"
                                                    @if ($tech->status == 'active') checked value="inactive" @else value="active" @endif>
                                                    <input type="checkbox"
                                                        @if ($tech->status == 'active') checked @endif>
                                                    <span class="slider round"></span>
                                                </label>
                                            </a> --}}

                                            <a href="{{ url('/status', $tech->id) }}"
                                                class="switch">
                                            <button type="button" class="btn"><div class="form-check form-switch">
                                                <label class="switch label_change"
                                                id="{{ $tech->id }}"
                                                @if ($tech->status == 'active') checked value="inactive" @else value="active" @endif>
                                                <input class="form-check-input" type="checkbox" @if ($tech->status == 'active') checked @endif>
                                            </div>	</button>  </a>
                                            
                                             
                                            <a href="{{route('edit_techvendor',$tech->id)}}">
                                            <button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> </a>
                                            <a href="{{route('destroy_techvendor',$tech->id)}}">
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
@section('js')
    {{-- <script>
        $(document).ready(function(){
            Webcam.set({
                width: 490,
                height: 350,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            
            Webcam.attach( '#my_camera' );
            
            takeSnapshot = function (oButton) {
        document.getElementById('camBox').style.display = 'block';
        document.getElementById('rowid').value = oButton.id
    }
                } );
            
        </script> --}}
        @stop