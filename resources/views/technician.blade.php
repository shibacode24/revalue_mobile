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
                                <h5 class="mb-0 text-primary">Vendor Registration</h5>
                            </div>
                            <hr>
                            <form class="row g-3" method="POST" action="{{route('create_technician')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label for="inputLastName1" class="form-label">First Name</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                        <input type="text" class="form-control border-start-0" id="inputLastName1" placeholder="First Name" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName2" class="form-label">Last Name</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                        <input type="text" class="form-control border-start-0" id="inputLastName2" placeholder="Last Name" name="lastname" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName1" class="form-label">Username</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                        <input type="text" class="form-control border-start-0" id="inputLastName1" placeholder="Username" name="username" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName2" class="form-label">Password</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                        <input type="text" class="form-control border-start-0" id="inputLastName2" placeholder="Password" name="password" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="inputPhoneNo" class="form-label">Phone No</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-microphone' ></i></span>
                                        <input type="text" class="form-control border-start-0" id="inputPhoneNo" placeholder="Phone No" name="phoneno"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                        <input type="text" class="form-control border-start-0" id="inputEmailAddress" placeholder="Email Address" name="email"/>
                                    </div>
                                </div>
                               <input type=hidden name="venodr" value="0">
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Upload Photo</label>
                                    <input class="form-control" id="fancy-file-upload" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png" multiple>
                                    {{-- <label for="inputFirstName" class="form-label">(Need 50 X 50 pixels in png format)</label> --}}
                                </div>
                              
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Aadhar Card </label>
                                        <input class="form-control" id="fancy-file-upload" type="file" name="aadharimage" accept=".jpg, .png, image/jpeg, image/png" multiple>
                                        {{-- <label for="inputFirstName" class="form-label">(Need 50 X 50 pixels in png format)</label> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Pan Card</label>
                                        <input class="form-control" id="fancy-file-upload" type="file" name="panimage" accept=".jpg, .png, image/jpeg, image/png" multiple>
                                        {{-- <label for="inputFirstName" class="form-label">(Need 50 X 50 pixels in png format)</label> --}}
                                    </div>
                                    
                                <div class="col-12">
                                    <label for="inputAddress3" class="form-label">Address</label>
                                    <textarea class="form-control" id="inputAddress3" placeholder="Enter Address" rows="3" name="address"></textarea>
                                </div>
                                {{-- <div id="my_camera"></div>
                                <br/>
                                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                <input type="hidden" name="image" class="image-tag">
                            </div>
                            <div class="col-md-6">
                                <div id="results">Your captured image will appear here...</div>
                            </div> --}}
                         
                                
                                <div class="col-12" align="center">
                                    <button type="submit" class="btn btn-danger px-5">Register</button>
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
                                        <th>First Name</th> 
                                        <th>Last Name</th> 
                                        <th>Phone No</th>
                                        <th>Email Address</th>
                                       
                                        <th>Upload Photo</th>
                                        <th>Aadhar Card</th>
                                        <th>Pan Card</th>
                                       
                                        <th>Address</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tech as $tech)
                                        
                                  
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$tech->first_name}}</td>
                                        <td>{{$tech->last_name}}</td>
                                        <td>{{$tech->phone_no}}</td>
                                        <td>{{$tech->email}}</td>
                                  
                                        <td><a href="{{asset('public')."/".$tech->upload_photo}}">
                                            <img height="50px" width="50px" src="{{asset('public')."/".$tech->upload_photo}}" alt="" /></a></td>
                                        <td><a href="{{asset('public')."/".$tech->aadhar_card}}">
                                            <img height="50px" width="50px" src="{{asset('public')."/".$tech->aadhar_card}}" alt="" /></a></td>
                                        <td><a href="{{asset('public')."/".$tech->pan_card}}">
                                            <img height="50px" width="50px" src="{{asset('public')."/".$tech->pan_card}}" alt="" /></a></td>
                                        <td>{{$tech->address}}</td> 
                                        <td>{{$tech->username}}</td>
                                        <td>{{$tech->password}}</td>

                                        <td>   
                                            <button type="button" class="btn"><div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>	</button>
                                            
                                             <a href="{{route('edit_technicine',$tech->id)}}">
                                            <button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button> </a>
                                            <a href="{{route('destroy_technicine',$tech->id)}}">
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