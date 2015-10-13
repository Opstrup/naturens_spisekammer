@extends('layouts.main')

@section('title')
    {{ $data['plant']->name }}
@stop

@section('body')

    <div class="col-md-1"></div>

    <div class="col-md-6">
        <div class="page-header">
            <h1>{{ $data['plant']->name }} <small>{{ $data['plant']->name_latin }}</small></h1>
        </div>

        {{ Form::open(array('url' => 'delete-plant', 'method' => 'post')) }}
            {{ Form::hidden('plantId', $data['plant']->id) }}
            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => '', 'style' => 'float: right', 'title' => 'slet plante'))  }}
        {{ Form::close() }}

        {{ Form::open(array('url' => 'show-edit-plant', 'method' => 'post')) }}
            {{ Form::hidden('plantId', $data['plant']->id) }}
            {{ Form::button('<i class="glyphicon glyphicon-edit"></i>', array('type' => 'submit', 'class' => '', 'style' => 'float: right', 'title' => 'rediger plante'))  }}
        {{ Form::close() }}
        <br>

        <strong>Beskrivelse:</strong>
        <div class="well">
            <p> {{ $data['plant']->description }}</p>
        </div>

        <strong>Historie:</strong>
        <div class="well">
            <p> {{ $data['plant']->history }}</p>
        </div>

        <strong>Krydderi:</strong>
        @if($data['plant']->herb)
            <p>Ja</p>
        @else
            <p>Nej</p>
        @endif

        <strong>Spiselig:</strong>
        @if($data['plant']->eatable)
            <p>Ja</p>
        @else
            <p>Nej</p>
        @endif

        <strong>Sæson:</strong> <br>
        <ul>
        @foreach($data['seasons'] as $season)
            <li>{{ $season }}</li>
        @endforeach
        </ul>

        <strong>Farver:</strong> <br>
        <ul>
        @foreach($data['colors'] as $color)
            <li>{{ $color }}</li>
        @endforeach
        </ul>

        <strong>Højder:</strong> <br>
        <ul>
        @foreach($data['sizes'] as $size)
            <li>{{ $size }} cm</li>
        @endforeach
        </ul>

        <strong>Levesteder:</strong> <br>
        <ul>
        @foreach($data['habitats'] as $habitat)
            <li>{{ $habitat }}</li>
        @endforeach
        </ul>

    </div>
    <div class="col-md-4">
        @foreach($data['photos'] as $photo)
            <img src="{{ url($photo) }}" class="img-rounded" style="width: 266px; height: 400px; margin: 80px"> <br>
        @endforeach
    </div>

@stop