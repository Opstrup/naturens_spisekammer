@extends('layouts.main')

@section('title')
    Tilføj Ny Ingridients
@stop

@section('body')

    <h2>Tilføj ny ingridients til databasen</h2>

    {{ Form::open(array('url' => 'add-new-ingredient')) }}

        {{ Form::label('name', 'Navn:') }}
        {{ Form::text('name') }} <br>

    {{ Form::submit('Tilføj') }}

    {{ Form::close() }}

@stop
