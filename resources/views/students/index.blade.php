@extends('layouts.app')


@section('content')
<div class="container">
    <h3>Your Child's Performance</h3>
    <div class="container" style="background-color:white;padding:15px;margin-top:10px">



        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif


        <table class="table table-bordered">
            <tr>
                <th>Sr#</th>
                <th>Student's Name</th>

                <th>Email</th>




            </tr>
            @if($students)
            @foreach ($students as $student)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $student->firstName }} {{ $student->lastName }}</td>

                <td>{{ $student->email }}</td>




            </tr>
            <tr>
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>

                        <th>Status</th>
                        <th>Grade</th>
                        <th>Comments</th>


                    </tr>

                    @foreach($student->homework as $homework)
                    <tr>
                        <td>{{$homework->title}}</td>
                        <td>{{$homework->description}}</td>
                        <td>{{$homework->dueDate}}</td>
                        <td>{{$homework->status}}</td>

                        <td>{{$homework->grade}}</td>

                        <td>{{$homework->comment}}</td>

                    </tr>
                    @endforeach
                </table>
            </tr>

            @endforeach
            @endif
        </table>

    </div>
</div>

@endsection