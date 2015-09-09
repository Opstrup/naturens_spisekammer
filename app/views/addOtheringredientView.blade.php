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

    <table>
        <caption>Ingridientser i systemet</caption>
        <tr>
            <th>Navn</th>
        </tr>

        @foreach($data['otherIngredients'] as $recipe)
            <tr>
                <td>{{ $recipe->id }}</td>
                <td>{{ $recipe->name }}</td>
            </tr>
        @endforeach
    </table>

@stop
