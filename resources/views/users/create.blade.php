@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
            <div class="card">
                <div class="card-header">{{ __('Create New User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('users.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" required
                                    autocomplete="email" autofocus>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Account ID') }}</label>

                            <div class="col-md-6">
                                <input id="accountId" type="text" class="form-control " name="accountId" required
                                    autocomplete="accountId">


                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="typeId"
                                class="col-md-4 col-form-label text-md-right">{{ __('Select Type') }}</label>
                            <div class="col-md-6">

                                <select class="form-control" id="typeId" class="form-control " name="typeId" required
                                    autocomplete="typeId" autofocus>
                                    @foreach ($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>

                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required
                                    autocomplete="new-password">


                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection