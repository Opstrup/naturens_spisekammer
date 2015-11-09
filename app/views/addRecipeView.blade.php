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

            <strong>Planter:</strong>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th>Navn</th>
                        <th width="10%">Tilføj</th>
                    </tr>
                </thead>
            </table>
            <div id="table-scroll">
                <table class="table table-hover">
                    <tbody>
                        @foreach($data['plants'] as $plant)
                            <tr>
                                <td width="10%">{{ $plant->id }}</td>
                                <td>{{ $plant->name }}</td>
                                <td width="10%">{{ Form::checkbox('plantId_' . $plant->id, 'yes') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <br>

            <strong>Indgrientser:</strong>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th>Navn</th>
                        <th width="25%">Mængde</th>
                        <th width="10%">Måleenhed</th>
                        <th width="5%">Tilføj</th>
                    </tr>
                </thead>
            </table>
            <div id="table-scroll">
                <table class="table table-hover">
                    <tbody>
                        @foreach($data['otherIngredients'] as $otherIngredient)
                            <tr>
                                <td width="5%">{{ $otherIngredient->id }}</td>
                                <td>{{ $otherIngredient->name }}</td>
                                <td width="25%">{{ Form::text('amount', null, ['class' => 'form-control']) }}</td>
                                <td width="10%">{{ Form::select('measure', array('kg' => 'kg', 'teaspoon' => 'theske', 'ml' => 'ml', 'spoon' => 'spiseske', 'l' => 'l')) }}</td>
                                <td width="5%">{{ Form::checkbox('otherIngredientId_' . $otherIngredient->id, 'yes') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
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
