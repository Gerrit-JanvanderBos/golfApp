@extends('layouts.app')
@section('head')
<style>
    input{
        width: 40px;
    }
    .has-error{
        border: 2px solid red;
    }
</style>
@endsection
@section('content')
    <div class="container" >
        <div class="row">
            <div class="col-md-18">
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">{{ $card->name }}</div>--}}
                {{--<div class="panel-body">--}}
                <form method="POST" action="{{ route('score.update', $card->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Hole</th>
                        @for($i = 1; $i <= 18; $i++)
                            <th>{{ $i }}</th>
                        @endfor
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($card->players as $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                        @for($i = 1; $i <= 18; $i++)
                            <td>
                                <input class="form-group{{ $errors->has('hole_'.$i.'.'.$player->id) ? ' has-error' : '' }}" type="number" name="hole_{{ $i }}[{{ $player->id }}]" value="{{ old('hole_'.$i.'.'.$player->id, $player->{'hole_'.$i}) }}">
                            </td>
                        @endfor
                        <td>{{ $player->total }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                    <button type="submit">Submit</button>
                </form>
                {{--</div>--}}
            {{--</div>--}}
            </div>
        </div>
    </div>

@endsection