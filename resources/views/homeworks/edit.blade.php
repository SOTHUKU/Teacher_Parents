@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header">Update Homework Information</div>

                <div class="card-body">
                    <form method="POST" action="{{route('homeworks.update',$homework->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="row">



                            <div class="col-md-4">
                                <label for="courseId" class=" col-form-label ">{{ __('Select Course') }}</label>


                                <select class="form-control" value="{{ $homework->courseId }}" id="courseId"
                                    class="form-control " name="courseId" required autocomplete="courseId" autofocus>
                                    @foreach ($courses as $course)
                                    <option value="{{$course->id}}">{{$course->courseName}}</option>

                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-4">
                                <label for="teacherId" class=" col-form-label ">{{ __('Select Teacher') }}</label>


                                <select class="form-control" value="{{ $homework->teacherId }}" id="teacherId"
                                    class="form-control " name="teacherId" required autocomplete="teacherId" autofocus>
                                    @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>

                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-4">
                                <label for="studentId" class=" col-form-label ">{{ __('Select Student') }}</label>


                                <select class="form-control" value="{{ $homework->studentId }}" id="studentId"
                                    class="form-control " name="studentId" required autocomplete="studentId" autofocus>
                                    @foreach ($students as $student)
                                    <option value="{{$student->id}}">{{$student->firstName}} {{$student->lastName}}
                                    </option>

                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-4">
                                <label for="title" class="col-form-label ">{{ __('Home Work Title ') }}</label>


                                <input id="title" type="text" value="{{ $homework->title }}" class="form-control "
                                    name="title" required autocomplete="title" autofocus>



                            </div>

                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label for="description"
                                        class="col-form-label text-md-right">{{ __('Description') }}</label>


                                    <input id="description" value="{{ $homework->description }}" type="text"
                                        class="form-control " name="description" required autocomplete="description"
                                        autofocus>


                                </div>

                            </div>

                            <div class="col-md-4 ">

                                <div class="form-group ">
                                    <label for="due_date"
                                        class=" col-form-label text-md-right">{{ __('Due Date') }}</label>


                                    <input id="dueDate" value="{{ $homework->dueDate }}" type="date"
                                        class="form-control" name="dueDate" required autocomplete="dueDate" autofocus>



                                </div>


                            </div>

                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label for="status" class="col-form-label text-md-right">{{ __('Status') }}</label>


                                    <input id="status" value="{{ $homework->status }}" type="text" class="form-control "
                                        name="status" autocomplete="status" autofocus>



                                </div>

                            </div>



                            <div class="col-md-4 ">

                                <div class="form-group">
                                    <label for="grade" class=" col-form-label text-md-right">{{ __('Grade') }}</label>


                                    <input id="grade" value="{{ $homework->grade }}" type="text" class="form-control "
                                        name="grade" autocomplete="grade" autofocus>



                                </div>


                            </div>

                            <div class="col-md-4 ">

                                <div class="form-group">
                                    <label for="comment"
                                        class=" col-form-label text-md-right">{{ __('Comment') }}</label>


                                    <input id="comment" value="{{ $homework->comment }}" type="text"
                                        class="form-control " name="comment" autocomplete="comment" autofocus>



                                </div>


                            </div>


                            <div class="col-md-12 text-right">
                                <div class="form-group row  ">

                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>

                                </div>
                            </div>




                        </div>



                </div>






            </div>
            </form>
        </div>
    </div>

</div>

@stop