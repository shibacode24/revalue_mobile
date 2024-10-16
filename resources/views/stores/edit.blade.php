
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



                <b> <h3> Edit Store Information</h3></b>
                        <hr>
    <form class="row g-2" method="POST" action="{{ route('stores.update', $store->id) }}">
        @csrf
        @method('PUT')
        
                <div class="col-md-4">
               <div>
                <b><label for="store_name" class="form-label" style="margin-bottom:0px">Store Name:</label></b>
                  <input type="text" name="store_name" id="store_name" class="form-control" value="{{ $store->store_name }}" required>
        
               </div>
        </div>


        <div class="col-md-4">
            <div >
               <b><label for="location" class="form-label" style="margin-bottom:0px">Location:</label></b>
                <input type="text" name="location" id="location" class="form-control"value="{{ $store->location }}" required>
            </div>
        </div>

        
        <div class="col-md-4">
            <div >
                <b><label for="latitude" class="form-label" style="margin-bottom:0px">Latitude:</label></b>
                <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $store->latitude }}" required>
            </div>
        </div>

                <div class="col-md-4">
            <div >
                <b><label for="longitude" class="form-label" style="margin-bottom:0px">Longitude:</label></b>
                <input type="text" name="longitude" id="longitude" class="form-control" value="{{ $store->longitude }}" required>
            </div>
        </div>

                <div class="col-md-4">
            <div >
                <b><label for="address" class="form-label" style="margin-bottom:0px">Address:</label></b>
                <input type="text" name="address" id="address" class="form-control" value="{{ $store->address }}" required>
            </div>
        </div>

                <div class="col-md-4">
            <div >
                <b><label for="mobile_number" class="form-label" style="margin-bottom:0px">Mobile Number:</label></b>
                <input type="text" name="mobile_number" id="mobile_number" class="form-control" value="{{ $store->mobile_number }}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div style="margin-top:3vh;">
                <button type="submit" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Update</button>

             </div>
        </div>

    </form>

