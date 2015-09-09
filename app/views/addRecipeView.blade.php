@extends('layouts.main')

@section('title')
    Tilføj Ny Opskrift
@stop

@section('body')

    <h2>Tilføj ny opskrift til databasen</h2>

    {{ Form::open(array('url' => 'add-new-recipe')) }}

        {{ Form::label('name', 'Navn:') }}
        {{ Form::text('name') }} <br>

        {{ Form::label('storage', 'Opbevaring:') }}
        {{ Form::textarea('storage') }} <br>

        {{ Form::label('guide', 'Vejledning:') }}
        {{ Form::textarea('guide') }} <br>

        <h4>Type af opskrift:</h4>
        {{ Form::select('type', array('the' => 'The', 'soup' => 'Suppe')) }} <br>

        <div id="plantPickerTable">
            <table>
                <caption>Planter</caption>
                <tr>
                    <th>ID</th>
                    <th>Navn</th>
                    <th>Tilføj</th>
                </tr>

                @foreach($data['plants'] as $plant)
                    <tr>
                        <td>{{ $plant->id }}</td>
                        <td>{{ $plant->name }}</td>
                        <td>{{ Form::checkbox('plantId_' . $plant->id, 'yes') }}</td>
                    </tr>
                @endforeach

            </table>
        </div>
        <br>
        <div id="otherIngredientPickerTable">
            <table>
                <caption>Indgrientser</caption>
                <tr>
                    <th>ID</th>
                    <th>Navn</th>
                    <th>Mængde</th>
                    <th>Måleenhed</th>
                    <th>Tilføj</th>
                </tr>

                @foreach($data['otherIngredients'] as $otherIngredient)
                    <tr>
                        <td>{{ $otherIngredient->id }}</td>
                        <td>{{ $otherIngredient->name }}</td>
                        <td>{{ Form::text('amount') }}</td>
                        <td>{{ Form::select('measure', array('kg' => 'kg', 'teaspoon' => 'theske', 'ml' => 'ml', 'spoon' => 'spiseske', 'l' => 'l')) }}</td>
                        <td>{{ Form::checkbox('otherIngredientId_' . $otherIngredient->id, 'yes') }}</td>
                    </tr>
                @endforeach

            </table>
        </div>

        {{ Form::submit('Tilføj') }}

    {{ Form::close() }}

@stop
