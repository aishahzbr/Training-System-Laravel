@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>{{ __('Display Trainers Details') }}</b></div>

                <div class="card-body">
                    <!-- form start -->
                    <form>
                        <b>Name</b>
                        <input name="name" type="text" class="form-control" value="{{ $training-> name }}" readonly><br>
                        <b>Email</b>
                        <input name="email" type="email" class="form-control" value="{{ $training-> email }}" readonly><br>
                        <b>Mobile Number</b>
                        <input name="mobile_number" type="mobile" class="form-control" value="{{ $training->mobile_number }}" readonly><br>
                        <b>Department</b>
                        <input name="department" type="text" class="form-control" value="{{ $training-> departments_name }}" readonly><br>
                        <b>Gender</b>
                        <input name="gender" type="text" class="form-control" value="{{ ucfirst($training-> gender) }}" readonly><br>
                        <b>Address</b>
                        <input name="address" type="address" class="form-control" value="{{ $training-> address }}" readonly><br>
                        <b>Status</b>
                        <input name="status" type="status" class="form-control" value="{{ ucfirst($training-> status) }}" readonly><br>


                        <!-- <b>Filename</b> -->
                        <!-- <input name="filename" type="text" class="form-control" value="{{ $training->filename }}" readonly><br> -->
                        
                        <!-- display poster image if available -->
                        <!-- @if ($training->filename == null) -->
                            <!-- <img src="{{ env('APP_URL') }}/storage/no-image.png" width="300"> -->
                        <!-- <input name="filename" type="text" class="form-control" value="Image not available" readonly><br> -->

                        @else
                        <br>
                            <input name="filename" type="text" class="form-control" value="{{ $training->filename }}" readonly><br>

                            <img src="{{ env('APP_URL') }}/storage/{{ $training->filename }}" width="300">
                        @endif

                        <br><br>
                        <a  href="{{ route('trainer:trainer')}}" class="btn btn-primary float-right">Back</a>
                     
                    </form>
                    <!-- form ends -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
