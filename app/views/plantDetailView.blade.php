@extends('layouts.main')

@section('title')
    {{ $data['plant']->name }}
@stop

@section('body')

    <div class="col-md-6">
        <div class="page-header">
            <h1>{{ $data['plant']->name }} <small>{{ $data['plant']->name_latin }}</small></h1>
        </div>

        {{ Form::open(array('url' => 'delete-plant', 'method' => 'post')) }}
            {{ Form::hidden('plantId', $data['plant']->id) }}
            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'name' => 'delete plant', 'style' => 'float: right', 'title' => 'slet plante'))  }}
        {{ Form::close() }}

        {{ Form::open(array('url' => 'show-edit-plant', 'method' => 'post')) }}
            {{ Form::hidden('plantId', $data['plant']->id) }}
            {{ Form::button('<i class="glyphicon glyphicon-edit"></i>', array('type' => 'submit', 'name' => 'edit plant', 'style' => 'float: right', 'title' => 'rediger plante'))  }}
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

        <fieldset>
            <legend>Sæson:</legend>
            <ul>
                @foreach($data['seasons'] as $season)
                    <li>{{ $season }}</li>
                @endforeach
            </ul>
        </fieldset>
        <br>

        <fieldset>
            <legend>Farver:</legend>
            <ul>
                @foreach($data['colors'] as $color)
                    <li>{{ $color }}</li>
                @endforeach
            </ul>
        </fieldset>
        <br>

        <fieldset>
            <legend>Højder:</legend>
            <ul>
                @foreach($data['sizes'] as $size)
                    <li>{{ $size }} cm</li>
                @endforeach
            </ul>
        </fieldset>
        <br>

        <fieldset>
            <legend>Levesteder:</legend>
            <ul>
                @foreach($data['habitats'] as $habitat)
                    <li>{{ $habitat }}</li>
                @endforeach
            </ul>
        </fieldset>

    </div>

    <div style="margin-top: 110px">
        @foreach($data['photos'] as $photo)
            @if($photo == 'null')
                <div class="col-md-2">
                <a href="http://placehold.it/266x400" class="thumbnail" style="width: 133px; height: 200px;">
                    <img src="http://placehold.it/266x400" class="img-rounded">
                </a>
                </div>
            @else
                <div class="col-md-2">
                <a href="{{ url($photo) }}" class="thumbnail" style="width: 133px; height: 200px;">
                    <img src="{{ url($photo) }}" class="img-rounded">
                </a>
                </div>
            @endif
        @endforeach
    </div>


@stop