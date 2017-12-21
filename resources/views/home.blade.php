@extends('layouts.app')

@section('head')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var curentSelect = $('.selectstyled option:selected').html();
            $('.selectbox span').append(curentSelect);
            $('select.selectstyled').click(function () {
                curentSelect = $(this).children('option:selected').html();
                $(this).parent().children('span').html(curentSelect);
            });

            $('#createButton').click(function () {
                var e = document.getElementById("selectValues");
                var selectedValue = e.options[e.selectedIndex].value;
                this.disabled = true;
                var p = document.getElementById('container');
                var nameCard = document.createElement('input');
                nameCard.setAttribute('type', 'text');
                nameCard.setAttribute('id', 'cardName');
                nameCard.setAttribute('placeholder', 'Card Name');
                nameCard.setAttribute('name', 'cardName');

                p.appendChild(nameCard);
                for (i = 0; i < selectedValue; i++) {
                    var newElement = document.createElement("input");
                    var newBr = document.createElement('br');
                    newElement.setAttribute('type', 'text');
                    newElement.setAttribute('id', 'inputPlayer' + i);
                    newElement.setAttribute('placeholder', 'Name Player ' + (i + 1));
                    newElement.setAttribute('name', 'name[]');
                    p.appendChild(newBr);
                    p.appendChild(newElement);

                }
            });

        });

    </script>
    <style>
        body {
            background: -webkit-linear-gradient(left, #9b59b6 0%, #34495e 100%);
            width: 100%;
            height: 100%;
        }

        .selectbox {
            width: 200px;
            height: 30px;
            background: none;
            border: 3px solid #FFF;
            color: #000;
            position: absolute;
            margin-top: 15px;

        }

        button {
            background: none;
            color: #ffffff;
            border: 3px solid #FFFFFF;
            width: 200px;
            height: 30px;
        }

        .selectbox::after {
            display: block;
            position: absolute;
            right: 20px;
            font-size: 16px;
            top: 7px;
            color: #FFF;
        }

        .selectbox span {
            position: absolute;
            top: 6px;
            left: 10px;
            font-size: 16px;
            color: #FFF;
            font-weight: 300;
            line-height: 12px;
        }

        select {
            width: 200px;
            background: none;
            opacity: 0;
            height: 30px;
            margin: 0;
        }

        input {
            margin: 6px;

        }
        .buttondiv{
            width: 100%;
            height: 200px;
        }

    </style>
@endsection

@section('content')

    <div class="container" >
        <div class="row">
            <div class="col-md-offset-5">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="buttondiv">
                    <button id="createButton">Create Card</button>
                    <div class="selectbox" >
                        <span></span>

                        <select id="selectValues" class="selectstyled">
                            <option value="1">1 Player</option>
                            <option value="2">2 Players</option>
                            <option value="3">3 Players</option>
                            <option value="4">4 Players</option>
                            <option value="5">5 Players</option>
                        </select>
                    </div>
                </div>
                    <form method="POST" action="{{ route('card.store') }}">
                        {{ csrf_field() }}
                <div id="container"></div>
                        <button type="submit">Submit</button>
                    </form>

            </div>
        </div>
    </div>
@endsection
