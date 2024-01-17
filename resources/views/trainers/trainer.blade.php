    @extends('layouts.sbadmin')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <b>List of Trainers</b>

                    <div class="float-end">
                        <form class="form-inline" method="GET" action="{{ route('trainer:trainer') }}">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search here..." name="keyword" value="{{ request()->get('keyword') }}">
                                &nbsp;&nbsp;
                                <div class="input-group-append">
                                    <!-- <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button> -->
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                
                                </div>
                            </div>

                        </form>
                        
                        <br>
                        <form class="form-inline" method="GET" action="{{ route('trainer:trainer') }}">
                            <!-- New input field -->
                            <!-- <label><b>Filter By Department</b></label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" placeholder="New Input" name="new_input" value="{{ request()->get('new_input') }}">
                            </div> -->

                            <!-- <label><b>Filter By Status</b></label> -->
                            <div class="float-end">
                                <select name="status" class="form-control">
                                    <option value='0' disabled selected>-- Filter By Status --</option>
                                    <option value="active" {{request()->get('status') == 'active' ? 'selected':'' }}>Active</option>
                                    <option value="inactive" {{request()->get('status') == 'inactive' ? 'selected':'' }}>Inactive</option>
                                </select>

                                <select name="department" class="form-control">
                                <option value='0' disabled selected>
                                    @if(request()->has('department'))
                                        {{ $departmentData['data']->where('id', request()->get('department'))->first()->name }} 
                                    @else
                                        -- Filter By Department --
                                    @endif
                                </option>
                                    @foreach($departmentData['data'] as $department)
                                        <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;&nbsp;
                            <button class="btn btn-primary" type="submit">Filter</button>

                            <!-- Clear Filter Button -->
                            <a href="{{ route('trainer:trainer') }}" class="btn btn-secondary ml-2">Clear Filter</a>
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
                                    <th>Trainer</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <td></td>
                                    <th>Action</th>
                                    <td></td>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- trainings - table db -->
                                <!-- training - simpan data -->
                                @foreach ($trainings as $training)
                                    <tr>
                                        <td>{{ $loop->index + $trainings->firstItem() }}</td>
                                        <td>{{ $training->name }}</td>
                                        <td>{{ $training->departments_name }}</td>
                                        <td class="{{ $training->status === 'active' ? 'badge badge-success mt-2' : 'badge badge-danger mt-2' }} text-white ml-1">
                                             {{ ucfirst($training->status) }}
                                        </td>


                                        <td></td>

                                        <td>
                                            <!-- button show details -->
                                            <a class="btn btn-success btn-sm" href="{{ route('trainer:detail', $training->id) }}">
                                                <!-- <i class="bi bi-card-list"></i> -->
                                                <i class="fas fa-list"></i>
                                            </a> &nbsp;

                                            <!-- button edit -->
                                            <a class="btn btn-warning btn-sm" href="{{ route('trainer:edit', $training->id) }}">
                                                <!-- <i class="bi bi-pencil-square"></i> -->
                                                <i class="fas fa-pencil-alt"></i>
                                                
                                            </a>
                                        </td>

                                        <td></td>

                                        <!-- form with button delete -->
                                        <td>
                                            <form action="{{ route('trainer:delete', $training->id )}}" method="POST">
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
                            <!-- {{ $trainings->links() }} -->
                            {{ $trainings->appends(request()->query())->links() }}

                        
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
