
@extends('layout')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">

            <div class="col-md-8 mx-auto" >
                
            
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="card-title d-flex align-items-center">
                        
                            <h5 class="mb-0 text-primary">Add City</h5>
                        </div> -->
                    

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- <b><h3>File Upload for Excel</h3></b>
                <hr>
                <form class="row g-2" method="POST" action="{{ route('service-points.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8">
                            <div >
                                 <b><label class="form-label" style="margin-bottom:0px" for="State" for="file">Upload Excel/CSV File:</label></b>
                                 <input type="file" name="file" id="file" accept=".xlsx,.csv" class="form-control">
                             </div>
                    </div> --}}


                    {{-- <div class="col-md-4">
                        <div style="margin-top:3vh;">
                            <button type="submit" class="btn btn-primary"> Upload</button>

                         </div>
                    </div>
                </form> --}}
                {{-- <hr>
                <br><br> --}}

                        <b><h3>Create Service Point</h3></b>
                        <hr>
                        <form class="row g-2" method="POST" action="{{ route('service-points.store') }}">
                            @csrf

                            <div class="col-md-4">
                                <div >
                                     <b><label class="form-label" style="margin-bottom:0px" for="State">State:</label></b>
                                     <input type="text" name="State" id="State" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div >        
                                     <b><label class="form-label" style="margin-bottom:0px" for="City">City:</label></b>
                                     <input type="text" name="City" id="City" class="form-control" required>
                                 </div>
                            </div>
                     
                            <div class="col-md-4">
                               <div >  
                                    <b><label class="form-label" style="margin-bottom:0px" for="Location_Name">Location Name:</label></b>
                                    <input type="text" name="Location_Name" id="Location_Name" class="form-control" required>
                               </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div >  
                                   <b><label class="form-label" style="margin-bottom:0px" for="Contact_Person">Contact Person:</label></b>
                                   <input type="text" name="Contact_Person" id="Contact_Person" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div >  
                                   <b><label class="form-label" style="margin-bottom:0px" for="Mobile_No1">Mobile No. 1:</label></b>
                                   <input type="text" name="Mobile_No1" id="Mobile_No1" class="form-control" required>
                                 </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div >  
                                   <b><label class="form-label" style="margin-bottom:0px" for="Mobile_No2">Mobile No. 2:</label></b>
                                   <input type="text" name="Mobile_No2" id="Mobile_No2" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div >  
                                   <b><label class="form-label" style="margin-bottom:0px" for="Address_Pin_Code">Address Pin Code:</label></b>
                                   <input type="text" name="Address_Pin_Code" id="Address_Pin_Code" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div >  
                                     <b><label class="form-label" style="margin-bottom:0px" for="Status">Status:</label></b>
                                     <input type="text" name="Status" id="Status" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div style="margin-top:3vh;">
                                    <button type="submit" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Add</button>

                                 </div>
                            </div>
                            
                            </form>

                    </div>

                </div>
            </div>
        </div>
        

        
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <hr/>
        <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               <th>ID</th>
                               <th>State</th>
                               <th>City</th>
                               <th>Location Name</th>
                               <th>Contact Person</th>
                               <th>Mobile No1</th>
                               <th>Mobile No2</th>
                               <th>Address Pin Code</th>
                               <th>Status</th>
                                <th>Action</th>
                            </tr>         
                        </thead>
                                <tbody>
                                    @foreach($servicePoints as $servicePoint)
                                    <tr>
                                        <td>{{ $servicePoint->id }}</td>
                                        <td>{{ $servicePoint->State }}</td>
                                        <td>{{ $servicePoint->City }}</td>
                                        <td>{{ $servicePoint->Location_Name }}</td>
                                        <td>{{ $servicePoint->Contact_Person }}</td>
                                        <td>{{ $servicePoint->Mobile_No1 }}</td>
                                        <td>{{ $servicePoint->Mobile_No2 }}</td>
                                        <td>{{ $servicePoint->Address_Pin_Code }}</td>
                                        <td>{{ $servicePoint->Status }}</td>
                                        <td>
                                    <a href="{{ route('service-points.edit', $servicePoint->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('service-points.destroy', $servicePoint->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this banner image?')">Delete</button>
                                    </form>
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

@endsection