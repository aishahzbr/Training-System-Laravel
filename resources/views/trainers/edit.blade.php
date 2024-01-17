@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>{{ __('Update Trainer Record') }}</b></div>

                <div class="card-body">
                    <!-- form start -->
                    <!-- use url, route or action for action -->
                    <form action="{{ route('trainer:update', $training->id) }}" method="POST">
                        <!-- add security token -->
                        @csrf 
                        <b>Name</b>
                        <input name="name" type="text" class="form-control" value="{{ $training-> name }}"><br>
                        <b>Email</b>
                        <input name="email" type="email" class="form-control" value="{{ $training-> email }}" ><br>
                        <b>Mobile Number</b>
                        <input name="mobile_number" type="mobile" class="form-control" value="{{ $training->mobile_number }}" ><br>

                        <b>Department</b>
                        <input name="department" type="hidden" class="form-control" value="{{ $training->department }}">
                        <select name="department" class="form-control">
                            @foreach($departmentData['data'] as $department)
                                <option value='{{ $department->id }}' {{ $training->department == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        <br>

                        <b>Gender</b>
                        <select name="gender" class="form-control" value="{{ ucfirst($training->gender) }}">
                            <option value="male" {{ $training->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $training->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select><br>
                        
                        <b>Address</b>
                        <input name="address" type="address" class="form-control" value="{{ $training-> address }}" ><br>

                        <b>Status</b>
                        <select name="status" class="form-control" value="{{ ucfirst($training-> status) }}">
                            <option value="active" {{ $training->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $training->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select><br>

                        <!-- <a  href="{{ route('training:index')}}" class="btn btn-primary">Back</a> -->
                        <button type="submit" class="btn btn-warning float-end">Save Update</button>
                     
                    </form>
                    <!-- form ends -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
