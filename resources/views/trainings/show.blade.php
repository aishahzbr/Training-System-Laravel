@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>{{ __('Display Complete Record') }}</b></div>

                <div class="card-body">
                    <!-- form start -->
                    <form>
                        <b>Title</b>
                        <input name="title" type="text" class="form-control" value="{{ $training-> title }}" readonly><br>
                        <b>Description</b>
                        <input name="description" type="text" class="form-control" value="{{ $training-> description }}" readonly><br>
                        <b>Trainer</b>
                        <input name="trainer" type="text" class="form-control" value="{{ $training->trainer }}" readonly><br>

                        <b>Filename</b>
                        <!-- <input name="filename" type="text" class="form-control" value="{{ $training->filename }}" readonly><br> -->
                        
                        <!-- display poster image if available -->
                        @if ($training->filename == null)
                            <!-- <img src="{{ env('APP_URL') }}/storage/no-image.png" width="300"> -->
                        <input name="filename" type="text" class="form-control" value="Image not available" readonly><br>

                        @else
                        <br>
                            <input name="filename" type="text" class="form-control" value="{{ $training->filename }}" readonly><br>

                            <img src="{{ env('APP_URL') }}/storage/{{ $training->filename }}" width="300">
                        @endif

                        <br>

                        <b>Training Module</b>

                        <!-- display poster image if available -->
                        @if ($training->fileupload == null)
                            <!-- <img src="{{ env('APP_URL') }}/storage/no-image.png" width="300"> -->
                        <input name="fileupload" type="text" class="form-control" value="File not available" readonly><br>

                        @else
                        <br>
                            <!-- <input name="fileupload" type="text" class="form-control" value="{{ $training->fileupload }}" readonly><br> -->

                            <embed src="{{ env('APP_URL') }}/storage/{{ $training->fileupload }}" type="application/pdf" width="600px" height="300px">


                            <!-- <embed src="{{ env('APP_URL') }}/storage/{{ $training->fileupload }}" width="300"> -->
                        @endif


                        <br><br>
                        <a  href="{{ route('training:index')}}" class="btn btn-primary float-right">Back</a>
                     
                    </form>
                    <!-- form ends -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
