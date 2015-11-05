@extends('layouts.main')

@section('title')
    Tilføj Ny Opskrift
@stop

@section('body')

    <h2>Tilføj ny opskrift til databasen</h2>

    <div class="form-group">

        {{ Form::open(array('url' => 'add-new-recipe')) }}

        <div class="col-md-6">

            {{ Form::label('name', 'Navn:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }} <br>

            {{ Form::label('storage', 'Opbevaring:') }}
            {{ Form::textarea('storage', null, ['class' => 'form-control']) }} <br>

            {{ Form::label('guide', 'Vejledning:') }}
            {{ Form::textarea('guide', null, ['class' => 'form-control']) }} <br>

        </div>

        <div class="col-md-5">
            <h4>Type af opskrift:</h4>
            {{ Form::select('type', array('the' => 'The', 'soup' => 'Suppe')) }} <br><br>

            <div id="plantPickerTable">
                <table class="table table-hover">
                    {{ Form::label(null, 'Planter:') }}
                    <tr>
                        <th>ID</th>
                        <th>Navn</th>
                        <th>Tilføj</th>
                    </tr>

                    @foreach($data['plants'] as $plant)
                        <tr>
                            <td width="10%">{{ $plant->id }}</td>
                            <td>{{ $plant->name }}</td>
                            <td width="10%">{{ Form::checkbox('plantId_' . $plant->id, 'yes') }}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
            <br>
            <div id="otherIngredientPickerTable">
                <table class="table table-hover">
                    {{ Form::label(null, 'Indgrientser:') }}
                    <tr>
                        <th>ID</th>
                        <th>Navn</th>
                        <th>Mængde</th>
                        <th>Måleenhed</th>
                        <th>Tilføj</th>
                    </tr>

                    @foreach($data['otherIngredients'] as $otherIngredient)
                        <tr>
                            <td width="5%">{{ $otherIngredient->id }}</td>
                            <td>{{ $otherIngredient->name }}</td>
                            <td width="25%">{{ Form::text('amount', null, ['class' => 'form-control']) }}</td>
                            <td width="10%">{{ Form::select('measure', array('kg' => 'kg', 'teaspoon' => 'theske', 'ml' => 'ml', 'spoon' => 'spiseske', 'l' => 'l')) }}</td>
                            <td width="5%">{{ Form::checkbox('otherIngredientId_' . $otherIngredient->id, 'yes') }}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

        <div class="col-md-2 col-md-offset-5">
            {{ Form::submit('Tilføj', array('class' => 'btn btn-default', 'name' => 'addNewRecipe')) }}
            <br><br>
        </div>

        {{ Form::close() }}

    </div>
@stop
