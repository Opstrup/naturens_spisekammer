@extends('layouts.main')

@section('title')
    {{ $data['plant']->name }}
@stop

@section('body')

    <h2>Plante navn: {{ $data['plant']->name }}</h2><hr>
    <h4>Plante navn latin: {{ $data['plant']->name_latin }}</h4>

    <h4>Beskrivelse:</h4>
    <p> {{ $data['plant']->description }}</p>

    <h4>Historie:</h4>
    <p> {{ $data['plant']->history }}</p>

    <h4>Krydderi:</h4>
    @if($data['plant']->herb)
        <p>Ja</p>
    @else
        <p>Nej</p>
    @endif

    <h4>Spiselig:</h4>
    @if($data['plant']->eatable)
        <p>Ja</p>
    @else
        <p>Nej</p>
    @endif

    <h4>Sæson:</h4>
    @foreach($data['seasons'] as $season)
        {{ $season }} <br>
    @endforeach
@stop