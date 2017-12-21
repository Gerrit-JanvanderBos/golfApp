@extends('layouts.app')
@section('head')
    <style>
        input{
            width: 40px;
        }
        li{
            list-style-type: none;
        }
    </style>
@endsection
@section('content')
    <div class="container" >
        <div class="row">
            <div class="col-md-18">
                <div class="panel panel-default">
                    <div class="panel-heading">My Cards</div>
                        <div class="panel-body">
                            <div class="list-group">
                            @foreach($cards as $card)
                                <a class="list-group-item" href="{{route('card.show', $card->id)}}">
                                    {{$card->name}}
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection