<!DOCTYPE html>
<html>

<head>
    <title>Edit Service Point</title>
</head>

<body>
    <h1>Edit Service Point</h1>
    <form method="POST" action="{{ route('service-points.update', $servicePoint->id) }}">
        @csrf
        @method('PUT')


        <div class="col-md-4">
            <div>
                <label for="State">State:</label>
                <input type="text" name="State" id="State" value="{{ $servicePoint->State }}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="City">City:</label>
                <input type="text" name="City" id="City" value="{{ $servicePoint->City }}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="Location_Name">Location Name:</label>
                <input type="text" name="Location_Name" id="Location_Name" value="{{ $servicePoint->Location_Name }}"
                    required>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="Contact_Person">Contact Person:</label>
                <input type="text" name="Contact_Person" id="Contact_Person" value="{{ $servicePoint->Contact_Person }}"
                    required>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="Mobile_No1">Mobile No. 1:</label>
                <input type="text" name="Mobile_No1" id="Mobile_No1" value="{{ $servicePoint->Mobile_No1 }}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="Mobile_No2">Mobile No. 2:</label>
                <input type="text" name="Mobile_No2" id="Mobile_No2" value="{{ $servicePoint->Mobile_No2 }}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="Address_Pin_Code">Address Pin Code:</label>
                <input type="text" name="Address_Pin_Code" id="Address_Pin_Code"
                    value="{{ $servicePoint->Address_Pin_Code }}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="Status">Status:</label>
                <input type="text" name="Status" id="Status" value="{{ $servicePoint->Status }}" required>
            </div>
        </div>

        <div class="col-md-12">
            <div style="margin-top:3vh;">
                <button type="submit" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Update</button>

            </div>
        </div>




    </form>
</body>

</html>