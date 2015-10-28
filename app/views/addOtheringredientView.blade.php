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
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Navn</th>
                    <th>Batch</th>
                </tr>

                @foreach($data['otherIngredients'] as $ingredient)
                    <tr>
                        <td width="5%">{{ $ingredient->id }}</td>
                        <td>{{ $ingredient->name }}</td>
                        <td width="5%">{{ Form::checkbox('ingredient[]', $ingredient->id)}}</td>
                    </tr>
                @endforeach
            </table>

        {{ Form::close() }}
    </div>

@stop
