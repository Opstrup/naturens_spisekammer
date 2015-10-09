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
            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => '', 'style' => 'float: right'))  }}
        {{ Form::close() }}
        <br>

        <strong>Beskrivelse:</strong>
        <p> {{ $data['plant']->description }}</p>

        <strong>Historie:</strong>
        <p> {{ $data['plant']->history }}</p>

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

        <strong>Sæson:</strong>
        @foreach($data['seasons'] as $season)
            {{ $season }} <br>
        @endforeach

        <strong>Farver:</strong>
        @foreach($data['colors'] as $color)
            {{ $color }} <br>
        @endforeach

        <strong>Højder:</strong>
        @foreach($data['sizes'] as $size)
            {{ $size }} cm<br>
        @endforeach

        <strong>Levesteder:</strong>
        @foreach($data['habitats'] as $habitat)
            {{ $habitat }} <br>
        @endforeach

    </div>
    <div class="col-md-4">
        @foreach($data['photos'] as $photo)
            <img src="{{ url($photo) }}" class="img-rounded" style="width: 266px; height: 400px"> <br>
        @endforeach
    </div>

@stop