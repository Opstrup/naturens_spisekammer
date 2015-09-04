@extends('layouts.main')

@section('title')
    {{ $data['recipe']->name }}
@stop

@section('body')

    <h2>Opskrift navn: {{ $data['recipe']->name }}</h2><hr>

    <h4>Opbevaring:</h4>
    {{ $data['recipe']->storage }}

    <h4>Vejledning:</h4>
    {{ $data['recipe']->guide }}

    <h4>Type:</h4>
    {{ $data['recipe']->type }}

    <h4>Planter:</h4>
    @foreach($data['plants'] as $plant)
        {{ $plant['name'] }}
        <br>
    @endforeach

    <h4>Andre ingridienser:</h4>

@stop