@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <div class="pull-left">
                <h2>Chat @if($user)
                    ({{$user->firstName}} {{$user->lastName}})

                    @endif</h2>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-sm-3">
            <ul style="list-style:none;padding:10px;">
                @foreach($parents as $parent)

                <a href="{{ route('parents.messages',$parent->id) }}">
                    <li class="smsList">{{$parent->firstName}} {{$parent->lastName}}</li>
                </a>
                @endforeach

            </ul>
        </div>
        <div class="col-sm-9">
            <div class="mt-2" style="height:500px;overflow-y:auto;width:100%">
                @if($messages)

                <form method="POST" action="{{route('parents.send',$user->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">


                            <input id="title" placeholder="Title" type="text" class="form-control " name="title"
                                required autocomplete="title" autofocus>

                        </div>
                        <div class="col-sm-6">


                            <input id="message" placeholder="Message" type="text"
                                class="form-control @error('message') is-invalid @enderror" name="message" required
                                autocomplete="message" autofocus>
                        </div>
                        <div class="col-sm-2">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered mt-2">
                    <tr>


                        <th>Title</th>
                        <th>Message</th>






                        <th width="120px">Action

                        </th>
                    </tr>
                    @foreach ($messages as $message)
                    <tr>


                        <td>{{ $message->title }}</td>
                        <td>{{ $message->message }} </td>






                        <td>
                            <form action="{{ route('messages.destroy',$message->id) }}" method="POST">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

                @endif
                @if(!$messages)
                <h3>Select a chat to start conversation.</h3>

                @endif
            </div>
        </div>
    </div>
    <style>
    .smsList {
        border: 1px solid silver;
        padding: 10px;
        font-weight: 500;
        font-size: 17px;
    }

    .smsList:hover {
        background-color: white;
        cursor: pointer;
    }
    </style>
    @endsection