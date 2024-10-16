
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


                        <b><h3>Store Form</h3></b>
                        <hr>
                        <form class="row g-2" method="POST" action="{{ route('stores.store') }}">
                            @csrf

                            <div class="col-md-4">
                                <div >
                                    <b><label for="store_name" class="form-label" style="margin-bottom:0px">Store Name:</label></b>
                                    <input type="text" name="store_name" id="store_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div >
                                    <b><label for="location"class="form-label" style="margin-bottom:0px" >Location:</label></b>
                                    <input type="text" name="location" id="location" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div >
                                    <b><label for="latitude" class="form-label" style="margin-bottom:0px" >Latitude:</label></b>
                                    <input type="text" name="latitude" id="latitude" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div >
                                    <b><label for="longitude" class="form-label" style="margin-bottom:0px" >Longitude:</label></b>
                                    <input type="text" name="longitude" id="longitude" class="form-control" required>
        
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div >
                                    <b><label for="address" class="form-label" style="margin-bottom:0px" >Address:</label></b>
                                    <input type="text" name="address" id="address" class="form-control" required>
                                   
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div >
                                    <b><label for="mobile_number" class="form-label" style="margin-bottom:0px" >Mobile Number:</label></b>
                                    <input type="text" name="mobile_number" id="mobile_number" class="form-control" required>
                                   
                                </div>
                            </div>

                            <div class="col-md-2">
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
                                <th>Store Name</th>
                                <th>Location</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Address</th>
                                <th>Mobile Number</th>
                                <th>Action</th>
                            </tr>         
                        </thead>
                        <tbody>
                            @foreach($stores as $store)
                            <tr>
                                <td>{{ $store->id }}</td>
                                <td>{{ $store->store_name }}</td>
                                <td>{{ $store->location }}</td>
                                <td>{{ $store->latitude }}</td>
                                <td>{{ $store->longitude }}</td>
                                <td>{{ $store->address }}</td>
                                <td>{{ $store->mobile_number }}</td>
                                <td>
                                    <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display: inline-block;">
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