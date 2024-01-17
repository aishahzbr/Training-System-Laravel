@extends('layouts.template_landingpage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <b>Trainings Provided</b>

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
                            </tr>
                        </thead>

                        <tbody>
                            <!-- trainings - table db -->
                            <!-- training - simpan data -->
                            @foreach ($trainings as $training)
                            <tr>
                                <td>{{ $training->id }}</td>
                                <td>{{ $training->title }}</td>
                                <!-- <td>{{ $training->trainer }}</td> -->
                                <td>
                                    <!-- button show details -->
                                    <a class="btn btn-success btn-sm" href="{{ route('training:show', $training->id) }}">
                                        <i class="bi bi-card-list"></i>
                                    </a> &nbsp;
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
            </div>
        </div>
    </div>
</div>
@endsection