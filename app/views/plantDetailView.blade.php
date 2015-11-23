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

        <fieldset>
            <legend>Anvendelse:</legend>
            <ul>
                @foreach($data['applications'] as $application)
                    <li>{{ $application }}</li>
                @endforeach
            </ul>
        </fieldset>
        <br>

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

    </div>

    <div style="margin-top: 95px">
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

        @foreach($data['photos'] as $photo)
            @if($photo == 'null')
                <div class="col-md-2">
                    <a href="http://placehold.it/266x470" class="thumbnail" style="width: 133px; height: 230px;">
                        <img src="http://placehold.it/266x470" class="img-rounded">
                    </a>
                </div>
            @else
                <div class="col-md-2">
                    <a href="{{ url($photo) }}" class="thumbnail" style="width: 133px; height: 230px;">
                        <img src="{{ url($photo) }}" class="img-rounded">
                    </a>
                </div>
            @endif
        @endforeach
    </div>


@stop