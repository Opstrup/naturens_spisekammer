@extends('layouts.main')

@section('title')
    Tilføj Ny Ingridients
@stop

@section('body')

    <div class="col-md-6">
        <h2>Tilføj ny ingridients til databasen</h2>

        {{ Form::open(array('url' => 'add-new-ingredient', 'class' => 'form-inline')) }}

            <div class="form-group">

                {{ Form::label('name', 'Ingridient:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }} <br>

            </div>

            {{ Form::submit('Tilføj', array('class' => 'btn btn-default', 'name' => 'addIngredient')) }}

        {{ Form::close() }}


        {{ Form::open(array('url' => 'delete-ingredient')) }}

            {{ Form::submit('Slet', array('class' => 'btn btn-default', 'name' => 'deleteIngredient')) }}

            <br><br>

        <div id="ingredientTable">
            <table class="table table-hover" style="margin-bottom: -1px">
                <thead>
                    <tr>
                        <th width="10px">ID</th>
                        <th width="600px">Navn</th>
                        <th width="10px">Batch</th>
                    </tr>
                </thead>
            </table>

            <div style="overflow: auto; height: 350px;">
                <table class="table table-hover">
                    <tbody>
                        @foreach($data['otherIngredients'] as $ingredient)
                            <tr>
                                <td width="10px">{{ $ingredient->id }}</td>
                                <td width="600px">{{ $ingredient->name }}</td>
                                <td width="10px">{{ Form::checkbox('ingredient[]', $ingredient->id)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ Form::close() }}
    </div>

@stop
