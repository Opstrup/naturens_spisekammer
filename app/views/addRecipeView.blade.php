@extends('layouts.main')

@section('title')
    Tilføj Ny Opskrift
@stop

@section('body')

    <div class="form-group">

        {{ Form::open(array('url' => 'add-new-recipe')) }}

        <div class="col-md-6">

            <h2>Tilføj ny opskrift til databasen</h2>

            {{ Form::label('name', 'Navn:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }} <br>

            {{ Form::label('storage', 'Opbevaring:') }}
            {{ Form::textarea('storage', null, ['class' => 'form-control']) }} <br>

            {{ Form::label('guide', 'Vejledning:') }}
            {{ Form::textarea('guide', null, ['class' => 'form-control']) }} <br>

            <h4>Type af opskrift:</h4>
            {{ Form::select('type', array('the' => 'The', 'soup' => 'Suppe')) }} <br>

        </div>

        <div class="col-md-5" style="margin-top: 85px">
            <div id="plantTable">
                <strong>Planter:</strong>

                <table class="table table-hover" style="margin-bottom: -1px">
                    <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Navn</th>
                            <th width="30px">Tilføj</th>
                        </tr>
                    </thead>
                </table>
                <div style="overflow: auto; height: 250px;">
                    <table class="table table-hover">
                        <tbody>
                            @foreach($data['plants'] as $plant)
                                <tr>
                                    <td width="10px">{{ $plant->id }}</td>
                                    <td>{{ $plant->name }}</td>
                                    <td width="30px">{{ Form::checkbox('plantId_' . $plant->id, 'yes') }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <br>

            <div id="ingredientTable">
                <strong>Indgrientser:</strong>
                <table class="table table-hover" style="margin-bottom: -1px">
                    <thead>
                        <tr>
                            <th width="20px">ID</th>
                            <th>Navn</th>
                            <th width="120px">Mængde</th>
                            <th width="30px">Måleenhed</th>
                            <th width="30px">Tilføj</th>
                        </tr>
                    </thead>
                </table>

                <div style="overflow: auto; height: 250px;">
                    <table class="table table-hover">
                        <tbody>
                            @foreach($data['otherIngredients'] as $otherIngredient)
                                <tr>
                                    <td width="20px">{{ $otherIngredient->id }}</td>
                                    <td width="">{{ $otherIngredient->name }}</td>
                                    <td width="120px">{{ Form::text('amount', null, ['class' => 'form-control']) }}</td>
                                    <td width="30px">{{ Form::select('measure', array('kg' => 'kg', 'teaspoon' => 'theske', 'ml' => 'ml', 'spoon' => 'spiseske', 'l' => 'l')) }}</td>
                                    <td width="30px">{{ Form::checkbox('otherIngredientId_' . $otherIngredient->id, 'yes') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-2 col-md-offset-5">
            {{ Form::submit('Tilføj', array('class' => 'btn btn-default', 'name' => 'addNewRecipe')) }}
            <br><br>
        </div>

        {{ Form::close() }}

    </div>
@stop
