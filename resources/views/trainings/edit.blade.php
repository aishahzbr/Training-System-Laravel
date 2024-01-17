@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>{{ __('Update Record') }}</b></div>

                <div class="card-body">
                    <!-- form start -->
                    <!-- use url, route or action for action -->
                    <form action="{{ route('training:update', $training->id) }}" method="POST">
                        <!-- add security token -->
                        @csrf 
                        <!-- <input name="ID" type="text" class="form-control" value="{{ $training-> id }}" readonly> -->
                        <b>Title</b>
                        <input name="title" type="text" class="form-control" value="{{ $training-> title }}" ><br>
                        <b>Description</b>
                        <input name="description" type="text" class="form-control" value="{{ $training-> description }}" ><br>
                        <b>Trainer</b>
                        <input name="trainer" type="text" class="form-control" value="{{ $training->trainer }}" ><br>
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
