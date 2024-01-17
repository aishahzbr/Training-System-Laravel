@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Insert New Trainer') }}</div>

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
                    <form action ="{{ url('/trainers/create') }}" 
                    method ="POST"
                    enctype="multipart/form-data"
                    >
                        <!-- csrf: generate security token -->
                        @csrf

                        Name
                        <input name="name" type="text" class="form-control"> <br>

                        Email
                        <input name="email" type="email" class="form-control">  <br>

                        Mobile Number
                        <input name="mobile_number" type="text" class="form-control"> <br>

                        Gender
                        <select name="gender" class="form-control">
                        <option value='0' disabled selected>-- Select Gender --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select><br>

                        Department
                        <select id='sel_depart' name='sel_depart' class="form-control">
                            <option value='0' disabled selected>-- Select Department --</option>
                            @foreach($departmentData['data'] as $department)
                                <option value='{{ $department->id }}'>{{ $department->name }}</option>
                            @endforeach
                        </select><br>

                        <!-- Status
                        <input name="attachment" type="file" class="form-control"><br> -->

                        Address
                        <input name="address" type="text area" class="form-control"><br>

                        <button type="submit" class="btn btn-primary">Submit Record</button>


                    </form>

                    <!-- form ends -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
