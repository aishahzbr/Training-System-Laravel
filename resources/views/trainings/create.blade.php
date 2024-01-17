@extends('layouts.sbadmin')

@section('content')
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Insert New Record') }}</div>

                <div class="card-body">
                    <!-- show validation error message -->
                    <!-- errors come from training controller -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session('success'))
                    <div id="success-alert" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- form start -->
                    <!-- action point to function store. can use url, or routing -->
                    <form action ="{{ url('/trainings/create') }}" 
                    method ="POST"
                    enctype="multipart/form-data"
                    >
                        <!-- csrf: generate security token -->
                        @csrf

                        Title
                        <input name="title" type="text" class="form-control"> <br>

                        Description
                        <input name="description" type="text" class="form-control">  <br>
                        
                        Department
                        <select id='sel_depart' name='sel_depart' class="form-control">
                            <option value='0' disabled selected>-- Select Department --</option>
                            @foreach($departmentData['data'] as $department)
                                <option value='{{ $department->id }}'>{{ $department->name }}</option>
                            @endforeach
                        </select><br>


                        Trainer
                        <select id='sel_trainer' name='sel_trainer' class="form-control">
                            <option value='0' disabled selected>-- Select Trainer --</option>
                           
                        </select><br>

                        Upload Image
                        <input name="attachment" type="file" class="form-control"><br>

                        
                        Upload Training Module
                        <input name="attachmentfile" type="file" class="form-control"><br>

                        <button type="submit" class="btn btn-primary">Submit Record</button><br>




                    </form>

                    <!-- form ends -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
// JavaScript
$(document).ready(function(){
    $('#sel_depart').change(function(){
        // Department id
        var id = $(this).val();
        
        // Empty the dropdown
        $('#sel_trainer').find('option').not(':first').remove();

        // AJAX request 
        $.ajax({
            url: 'getTrainers/'+id,
            type: 'get',
            dataType: 'json',
            // success: function(response){
            //     var len = 0;
            //     if(response['data'] != null){
            //         len = response['data'].length;
            //     }

            //     if(len > 0){
            //         // Read data and create <option >
            //         for(var i=0; i<len; i++){
            //             var name = response['data'][i].name;
            //             var option = "<option value='"+name+"'>"+name+"</option>"; 
            //             $("#sel_trainer").append(option); 
            //         }
            //     }
            // }
            // ...
            success: function (response) {
                console.log(response);
                var len = response['data'] ? response['data'].length : 0;

                if (len > 0) {
                    // Read data and create <option >
                    for (var i = 0; i < len; i++) {
                        var name = response['data'][i].name;
                        var option = "<option value='" + name + "'>" + name + "</option>";
                        $("#sel_trainer").append(option);
                    }
                } else {
                    // Handle the case where no trainers are returned
                    $("#sel_trainer").append("<option value=''>No trainers available</option>");
                    // You can also disable the dropdown or take any other action based on your requirements
                }
            }
        });
    });
});

</script>
@endsection
