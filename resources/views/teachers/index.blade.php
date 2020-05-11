@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <div class="pull-left">
                <h2>Teachers</h2>
            </div>

        </div>
        <div class="col-lg-6 margin-tb">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('teachers.create') }}"> Add New Teacher</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Sr#</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Post Code</th>
            <th>Area</th>
            <th>Position</th>

            <th width="120px">Action

            </th>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->dob }}</td>
            <td>{{ $teacher->phoneNumber }}</td>

            <td>{{ $teacher->address }}</td>
            <td>{{ $teacher->postCode }}</td>
            <td>{{ $teacher->area }}</td>
            <td>{{ $teacher->position }}</td>


            <td>
                <form action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}"><i
                            class="fa fa-pencil"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>

@endsection