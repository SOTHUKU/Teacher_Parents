@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <div class="pull-left">
                <h2>Parents</h2>
            </div>

        </div>
        <div class="col-lg-6 margin-tb">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('parents.create') }}"> Add Parent</a>
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
            <th>Title</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>DOB</th>

            <th>Address</th>
            <th>Post Code</th>
            <th>Area</th>
            <th>Student</th>
            <th>User</th>

            <th width="120px">Action

            </th>
        </tr>
        @foreach ($parents as $parent)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $parent->title }}</td>
            <td>{{ $parent->firstName }}</td>
            <td>{{ $parent->lastName }}</td>
            <td>{{ $parent->dob }}</td>

            <td>{{ $parent->address }}</td>
            <td>{{ $parent->postCode }}</td>
            <td>{{ $parent->area }}</td>

            <td>{{ $parent->student->firstName }} {{ $parent->student->lastName }}</td>
            <td>{{ $parent->user->email }}</td>


            <td>
                <form action="{{ route('parents.destroy',$parent->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('parents.edit',$parent->id) }}"><i
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