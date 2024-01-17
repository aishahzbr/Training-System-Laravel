@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <b>Training Index</b>
               
                <div class="float-end">
                    <form class="form-inline" method="GET" action="{{ route('training:index') }}">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search here..." name="keyword" value="{{ request()->get('keyword') }}">
                            &nbsp;&nbsp;
                            <div class="input-group-append">
                                <!-- <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button> -->
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                               
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="card-body">
                @if (session('success'))
                    <div id="success-alert" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <!-- <th>Trainer</th> -->
                                <th>Action</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- trainings - table db -->
                            <!-- training - simpan data -->
                            @foreach ($trainings as $training)
                            <tr>
                                <td>{{ $trainings->firstItem() + $loop->index }}</td>
                                <td>{{ $training->title }}</td>
                                <!-- <td>{{ $training->trainer }}</td> -->
                                <td>
                                    <!-- button show details -->
                                    <a class="btn btn-success btn-sm" href="{{ route('training:show', $training->id) }}">
                                        <!-- <i class="bi bi-card-list"></i> -->
                                        <i class="fas fa-list"></i>
                                    </a> &nbsp;

                                    <!-- button edit -->
                                    <a class="btn btn-warning btn-sm" href="{{ route('training:edit', $training->id) }}">
                                        <!-- <i class="bi bi-pencil-square"></i> -->
                                        <i class="fas fa-pencil-alt"></i>
                                        
                                    </a>
                                </td>
                                
                                    <!-- form with button delete -->
                                    <td>
                                        <form action="{{ route('training:delete', $training->id )}}" method="POST">
                                            @csrf 
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete record ID: {{$training->id}}')">
                                                <!-- <i class="bi bi-trash"></i> -->
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                               
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div>
                        <!-- pagination -->
                        {{ $trainings->links() }}
                       
                    </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        // Automatically hide the success alert after 3 seconds
        setTimeout(function () {
            $('#success-alert').fadeOut('fast');
        }, 1000);
    });
</script>
@endsection
