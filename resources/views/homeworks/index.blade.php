@extends('layouts.app')


@section('content')
<div class="container">
    <div class="container" style="background-color:white;padding:15px;">
        <div class="row">
            <div class="col-lg-6 margin-tb">
                <div class="pull-left">
                    <h4>Homework</h4>
                </div>

            </div>
            <div class="col-lg-6 margin-tb">
                <div class="text-right">
                    <a class="btn btn-success" href="{{ route('homeworks.create') }}"> Add Home Work</a>
                </div>
            </div>
        </div>


        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered" style="margin-top:20px">
            <tr>
                <th>Sr#</th>
                <th>Course</th>
                <th>Student</th>

                <th>Title</th>
                <th>Dsscription</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Grade</th>
                <th>Comments</th>
                <th>Created Date</th>




                <th width="120px">Action

                </th>
            </tr>
            @foreach ($homeworks as $homework)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $homework->course->courseName }}</td>

                <td>{{ $homework->student->firstName }} {{ $homework->student->lastName }}</td>
                <td>{{ $homework->title }}</td>
                <td>{{ $homework->description }}</td>
                <td>{{ $homework->dueDate }}</td>
                <td>{{ $homework->status }}</td>
                <td>{{ $homework->grade }}</td>
                <td>{{ $homework->comment }}</td>
                <td>{{ $homework->created_at }}</td>




                <td>
                    <form action="{{ route('homeworks.destroy',$homework->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('homeworks.edit',$homework->id) }}"><i
                                class="fa fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>

@endsection