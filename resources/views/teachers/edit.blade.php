@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card ">
                <div class="card-header">Add Teacher Information</div>

                <div class="card-body">
                    <form method="POST" action="{{route('teachers.update',$teacher->id)}}"
                        enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')

                        <div class="row">




                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>


                                    <input id="name" value="{{ $teacher->name }}" type="text" class="form-control "
                                        name="name" autocomplete="name" autofocus>



                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob" class="col-form-label text-md-right">{{ __('DOB') }}</label>


                                    <input id="dob" value="{{ $teacher->dob }}" type="date" class="form-control "
                                        name="dob" required autocomplete="dob" autofocus>


                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="phoneNumber" class="col-form-label ">{{ __('Phone Number') }}</label>


                                <input id="phoneNumber" value="{{ $teacher->phoneNumber }}" type="text"
                                    class="form-control" name="phoneNumber" required autocomplete="phoneNumber"
                                    autofocus>


                            </div>















                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address"
                                        class="col-form-label text-md-right">{{ __('Address') }}</label>


                                    <input id="address" value="{{ $teacher->address }}" type="text"
                                        class="form-control " name="address" required autocomplete="address" autofocus>



                                </div>

                            </div>

                            <div class="col-md-4 ">

                                <div class="form-group ">
                                    <label for="postCode"
                                        class=" col-form-label text-md-right">{{ __('Post Code') }}</label>


                                    <input id="postCode" value="{{ $teacher->postCode }}" type="text"
                                        class="form-control" name="postCode" required autocomplete="postCode" autofocus>



                                </div>


                            </div>

                            <div class="col-md-4 ">

                                <div class="form-group">
                                    <label for="area" class=" col-form-label text-md-right">{{ __('Area') }}</label>


                                    <input id="area" value="{{ $teacher->area }}" type="text" class="form-control "
                                        name="area" required autocomplete="area" autofocus>



                                </div>


                            </div>
                            <div class="col-md-4 ">

                                <div class="form-group">
                                    <label for="position"
                                        class=" col-form-label text-md-right">{{ __('Position') }}</label>


                                    <input id="position" value="{{ $teacher->position }}" type="text"
                                        class="form-control " name="position" required autocomplete="position"
                                        autofocus>



                                </div>


                            </div>








                            <div class="col-md-12 text-right ">


                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Submit') }}
                                </button>


                            </div>
                        </div>

                </div>
            </div>
            </form>
        </div>
    </div>

</div>

@endsection