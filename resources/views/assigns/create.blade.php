@extends('layouts.sbadmin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Assign Trainings') }}</div>

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

                    <!-- successfully insert trainer alert -->
                    @if (session('success'))
                    <div id="success-alert" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- form start -->
                    <!-- action point to function store. can use url, or routing -->
                    <form action ="{{ url('/assigns/create') }}" 
                    method ="POST"
                    enctype="multipart/form-data"
                    >
                        <!-- csrf: generate security token -->
                        @csrf

                        Training
                        <select id='sel_training' name='sel_training' class="form-control">
                            <option value='0' disabled selected>-- Select Training --</option>
                            @foreach($trainingData['data'] as $training)
                                <option value="{{ $training}}">{{ $training }}</option>
                            @endforeach
                        </select><br>


                        Trainer
                        <select id='sel_trainer' name='sel_trainer' class="form-control">
                            <option value='0' disabled selected>-- Select Trainer --</option>
                           
                        </select><br>
                        Start Date
                        <input name="startdate" type="date" class="form-control"> <br>

                        End Date
                        <input name="endate" type="date" class="form-control"> <br>

                        <button type="submit" class="btn btn-primary">Submit</button><br>


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
    $('#sel_training').change(function(){
        // Department id
        var trainingName = $(this).val();
        
        // Empty the dropdown
        $('#sel_trainer').find('option').not(':first').remove();

        // AJAX request 
        $.ajax({
            url: 'getTrainers/' + trainingName,
            type: 'get',
            dataType: 'json',

            success: function (response) {
                console.log('Training Name:', trainingName);
                console.log('Response:', response);

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
