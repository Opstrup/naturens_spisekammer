@extends('layouts.main')

@section('title')
    Tilføj Ny Plante
@stop

@section('body')

    <h2>Tilføj ny plante til databasen</h2>

    {{ Form::open(array('url' => 'add-new-plant')) }}

        {{ Form::label('name', 'Navn:') }}
        {{ Form::text('name') }} <br>

        {{ Form::label('name_latin', 'Latinsk Navn:') }}
        {{ Form::text('name_latin') }} <br>

        {{ Form::label('description', 'Beskrivelse:') }}
        {{ Form::textarea('description') }} <br>

        {{ Form::label('history', 'Historie:') }}
        {{ Form::textarea('history') }} <br>

        {{ Form::label('herb', 'Krydderi:') }}
        {{ Form::checkbox('herb') }} <br>

        {{ Form::label('eatable', 'Spiselig:') }}
        {{ Form::checkbox('eatable') }} <br>

        <h4>Sæson:</h4>

        {{ Form::label('spring', 'Forår:') }}
        {{ Form::checkbox('spring') }}

        {{ Form::label('summer', 'Sommer:') }}
        {{ Form::checkbox('summer') }}

        {{ Form::label('autumn', 'Efterår:') }}
        {{ Form::checkbox('autumn') }}

        {{ Form::label('winter', 'Vinter:') }}
        {{ Form::checkbox('winter') }} <br>

    {{ Form::submit('Tilføj') }}

    {{ Form::close() }}

@stop
