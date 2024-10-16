@extends('layout')
@section('content')


    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            @include('alerts')
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-primary" role="tablist">
                       
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Mobile Model</div>
                                </div>
                            </a>
                        </li>


                    </ul>

                    <div class="tab-content py-3">
                   
                        <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                            <form class="row g-2" method="POST" action="{{ route('creat_module') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Select Mobile Brand</label>
                                    <select class="form-select mb-3" aria-label="Default select example"
                                        name="select_mobile_brand" id="mobilebrand">
                                        <option value="">Select Category</option>

                                        @foreach ($mobile_type as $mobiles_b)
                                            <option value="{{ $mobiles_b->id }}">{{ $mobiles_b->mobile_brand }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Select Mobile Series</label>
                                    <select class="form-select mb-3" aria-label="Default select example"
                                        name="select_mobile_series" id="mobileseries">

                                        <option value="">Select Mobile Series</option>

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Add Mobile Model</label>
                                    <input type="text" class="form-control" id="inputFirstName"
                                        placeholder="Add Mobile Model" name="add_mobile_module">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Mobile Model Image</label>
                                    <input class="form-control" id="fancy-file-upload" type="file" name="image"
                                        accept=".jpg, .png, image/jpeg, image/png" multiple>
                                    <label for="inputFirstName" class="form-label">(Need 50 X 50 pixels in png
                                        format)</label>
                                </div>

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select RAM</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name=""
                                        id="ram">
                                        <option selected>Select RAM</option>
                                        <option>1GB RAM</option>
                                        <option>2GB RAM</option>
                                        <option>3GB RAM</option>
                                        <option>4GB RAM</option>
                                        <option>6GB RAM</option>
                                        <option>8GB RAM</option>
                                        <option>12GB RAM</option>
                                        <option>16GB RAM</option>
                                        {{-- <option >20GB RAM</option> --}}
                                        <option>24GB RAM</option>
                                        <option>32GB RAM</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Storage</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name=""
                                        id="storage">
                                        <option selected>Select Storage</option>
                                        <option>32GB Storage</option>
                                        <option>64GB Storage</option>
                                        <option>128GB Storage</option>
                                        <option>256GB Storage</option>
                                        <option>512GB Storage</option>
                                        <option>1TB Storage</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Add Mobile Price</label>
                                    <input type="text" class="form-control" id="price"
                                        placeholder="Add Mobile Prices" name="">


                                </div>


                                <div class="col-md-2" style="padding:8px"><br>
                                    <button type="button" class="btn btn-primary px-3 add-row "><i
                                            class="fadeIn animated bx bx-plus"></i>Add </button>
                                </div>




                                <div class="col-md-12">
                                    <div class="row">
                                        {{-- <div class="col-md-3"></div> --}}
                                        <div class="col-md-6 " style="float-left">
                                            <table class="items_table table table-bordered width80" id="table">
                                                <thead>
                                                    <tr class="filters">

                                                    </tr>
                                                </thead>
                                                <tbody class="add_more">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-2" style="padding:8px"><br>
                                    <button type="submit" class="btn btn-primary px-3">ADD</button>
                                </div>

                            </form> <br>
                            <hr />
                            {{-- <div class="card"> --}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example111" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Mobile Brand</th>
                                                <th>Mobile Series</th>
                                                <th>Mobile Model</th>
                                                {{-- <th>RAM</th> 
														<th>Storage</th> 
														<th>Price(₹)</th>  --}}
                                                <th>Model Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($mobile_module as $mobiles)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $mobiles->mobile_brand }}</td>
                                                    <td>{{ $mobiles->add_mobile_series }}</td>
                                                    <td>{{ $mobiles->add_mobile_module }}</td>

                                                    <td>
                                                        <a href="{{ asset('public') . '/' . $mobiles->mobile_model_image }}">
                                                            <img height="50px" width="50px"
                                                                src="{{ asset('public') . '/' . $mobiles->mobile_model_image }}"
                                                                alt="">
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary px-3 viewinfo"
                                                            data-bs-toggle="modal" data-bs-target="#exampleLargeModal"
                                                            id="{{ $mobiles->mobile_module_id }}">show</button>

                                                        <a
                                                            href="{{ route('destroy_module', $mobiles->mobile_module_id) }}">
                                                            <button type="button" class="btn1 btn-outline-danger"><i
                                                                    class='bx bx-trash me-0'></i></button> </a>

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


        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title">Medicine Sale Report</h5> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <form action="{{route('approvalemis')}}" method="post" >
								@csrf --}}
                    {{-- <input type="text" id="getrecords" name="loan_idsss"> --}}
                    <div class="modal-body">
                        <table class="table mb-0 table-striped">
                            <thead>

                                <tr>

                                    <th scope="col">Ram</th>
                                    <th scope="col">Storage</th>
                                    <th scope="col">Price</th>

                                </tr>
                            </thead>
                            <tbody id="records">



                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--end page wrapper -->
    @stop

    @section('js')

        {{-- <script>

$(document).ready(function()
{

	$("#mobilebrand").on('change',function(){
var mobile_series=$("#mobileseries").val();

	

if(mobile_series==''){
	// alert('please select company');
}
	
			// alert(medicine);	
                $.ajax({
  url: "{{route('get_mobileseries_id')}}",
  type:'get',
  data:{ 
    mobile_series:mobile_series,

    },
  cache: false,
  success: function(result){
	console.log(result);
    $("#mobileseries").empty();
    $("#mobileseries").append(' <option value=""> Select </option>');
        $.each(result,function(a,b)
        {
            $("#mobileseries").append(' <option value="'+b.id+'">'+b.add_mobile_series+'</option>');
			
        })

 
      
  }
});
            })
   


		})

	
       
                </script> --}}

        <script>
            $(document).ready(function() {

                $("#mobilebrand").on('change', function() {
                    $.ajax({
                        url: "{{ route('get_mobileseries_id') }}",
                        type: 'get',
                        data: {
                            // mobile_series:$(this).val()
                            id: $(this).val()

                        },
                        cache: false,
                        success: function(result) {
                            console.log(result);
                            $("#mobileseries").empty();
                            $("#mobileseries").append(' <option value=""> Select </option>');
                            $.each(result, function(a, b) {
                                $("#mobileseries").append(' <option value="' + b.id + '">' +
                                    b.add_mobile_series + '</option>');

                            })

                        }
                    });
                })
            })
        </script>


        <script>
            $(document).ready(function() {

                $(".add-row").click(function() {
                        var ram = $('#ram option:selected').text();
                        var storage = $('#storage option:selected').text();
                        var price = $('#price').val(); // .text()se text ayega id nh


                        var markup =

                            '<tr><td><input type="text" name="ram[]" required="" style="border:none; width: 100%;" value="' +
                            ram +
                            '"></td><td><input type="text" name="storage[]" required="" style="border:none; width: 100%;" value="' +
                            storage +
                            '"></td><td><input type="text" name="price[]" required="" style="border:none; width: 100%;" value="' +
                            price +
                            '"></td>></td><td><button type="button" class="btn1 btn-outline-danger delete-row"><i class="bx bx-trash me-0"></i></button></td></tr>';



                        $(".add_more").append(markup);

                        $('#ram').val('');
                        $('#storage').val('');
                        $('#price').val('');



                    }

                )
                // Find and remove selected table rows
                $("tbody").delegate(".delete-row", "click", function() {
                    var mpsqnty = $(this).parents("tr").find('input[name="mpsqnty[]"]').val()
                    var ptrqnty = $(this).parents("tr").find('input[name="ptrqnty[]"]').val()

                    var grandtotal1 = $('#grandtotal1').val();
                    var grandtotal2 = $('#grandtotal2').val();

                    var total1 = parseFloat(grandtotal1) - parseFloat(mpsqnty)
                    var total2 = parseFloat(grandtotal2) - parseFloat(ptrqnty)
                    $('#grandtotal1').val(total1);
                    $('#grandtotal2').val(total2);

                    $(this).parents("tr").remove();

                    // final_calculations();


                });

            });
        </script>

        <script>
            $(document).ready(function() {
                $(".viewinfo").on('click', function() {
                    $("#getrecords").val($(this).attr('id'));
                    $.ajax({
                        url: "{{ route('get_record') }}",
                        type: 'get',
                        data: {
                            mobile_module_id: $(this).attr('id')

                        },

                        cache: false,
                        success: function(result) {
                            var recordss = result.module;




                            $("#records").empty();
                            $.each(recordss, function(a, b)

                                {

                                    $("#records").append('<tr><td>' + b.ram + '</td><td>' + b
                                        .storage + '</td><td>' + b.price + '</td></tr>');

                                })


                        }
                    });
                })



            })
        </script>

    @stop
