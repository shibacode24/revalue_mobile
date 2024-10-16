@extends('layout')
@section('content')

<div class="modal-body">
    <div class="card-body p-2">
        <form class="row g-2" method="POST" action="{{route('update_modal')}}">
            @csrf
            <input type="hidden" name="id" value="{{$dasboardedit->id}}">
            {{-- <div class="col-md-4">
                <label for="inputLastName1" class="form-label">User Name</label>
                <div class="input-group"> 
                    <input type="text" class="form-control " id="inputLastName1" placeholder="User Name" name="name" value="{{$dasboardedit->name}}"/>
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputLastName2" class="form-label">User Number</label>
                <div class="input-group"> 
                    <input type="text" class="form-control " id="inputLastName2" placeholder="User Number" name="user_number" value="{{$dasboardedit->mobile_no}}"/>
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputLastName2" class="form-label">Complaint</label>
                <div class="input-group"> 
                    <input type="text" class="form-control " id="inputLastName2" placeholder="Complaint" name="complaint" value="{{$dasboardedit->problem_category}}"/>
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputLastName2" class="form-label">Date of Complaint</label>
                <div class="input-group"> 
                    <input type="date" class="form-control " id="inputLastName2" placeholder="Date of Complaint" name="date" value="{{$dasboardedit->date}}"/>
                </div>
            </div> --}}
            <div class="col-md-4">
                <label for="inputFirstName" class="form-label">Assigned work to Technician</label>
                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected>Select Technician</option>
                    
                    @foreach ($tech as $dasboards)
                    <option value="{{$dasboards->id }}"
                        @if ($dasboardedit->assigned_to_tech_id==$dasboards->id)selected @endif>
                        {{$dasboards->assigned_to_tech}}</option>
                @endforeach			
                </select>
            </div>
            
            <div class="col-md-4">
                <label class="form-label">Date and Time</label>
                <input class="result form-control" type="text" id="date-time" placeholder="Date Picker..." value="{{$dasboardedit->assignedwork_date}}">
            </div>
            
        </form>
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>
</div>
</div>
@stop