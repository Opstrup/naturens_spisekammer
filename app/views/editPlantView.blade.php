@extends('layouts.main')

@section('title')
    Tilføj Ny Plante
@stop

@section('body')

    <h2>Rediger {{$data['plant']->name}}</h2>

    <div class="col-md-5">

        {{ Form::open(array('url' => 'edit-plant', 'method' => 'post', 'files' => true)) }}

        <div class="form-group">

            {{ Form::label('name', 'Navn:') }}
            {{ Form::text('name', $data['plant']->name, ['class' => 'form-control']) }} <br>

            {{ Form::label('name_latin', 'Latinsk Navn:') }}
            {{ Form::text('name_latin', $data['plant']->name_latin, ['class' => 'form-control']) }} <br>

            {{ Form::label('description', 'Beskrivelse:') }}
            {{ Form::textarea('description', $data['plant']->description, ['class' => 'form-control']) }} <br>

            {{ Form::label('history', 'Historie:') }}
            {{ Form::textarea('history', $data['plant']->history, ['class' => 'form-control']) }} <br>

            {{ Form::label('herb', 'Krydderi:') }}
            {{ Form::checkbox('herb', null , $data['plant']->herb) }} <br>

            {{ Form::label('eatable', 'Spiselig:') }}
            {{ Form::checkbox('eatable', null, $data['plant']->eatable) }} <br>

            <h4>Sæson:</h4>

            {{ Form::label('spring', 'Forår:') }}
            {{ Form::checkbox('spring', null, in_array('spring', $data['seasons'])) }}

            {{ Form::label('summer', 'Sommer:') }}
            {{ Form::checkbox('summer', null, in_array('summer', $data['seasons'])) }}

            {{ Form::label('autumn', 'Efterår:') }}
            {{ Form::checkbox('autumn', null, in_array('autumn', $data['seasons'])) }}

            {{ Form::label('winter', 'Vinter:') }}
            {{ Form::checkbox('winter', null, in_array('winter', $data['seasons'])) }} <br>

            <h4>Højde:</h4>

            {{ Form::label('10', 'Optil 10cm:') }}
            {{ Form::checkbox('10', null, in_array('10', $data['sizes'])) }}

            {{ Form::label('10-25', '10 - 25cm:') }}
            {{ Form::checkbox('10-25', null, in_array('10-25', $data['sizes'])) }}

            {{ Form::label('25-40', '25 - 40cm:') }}
            {{ Form::checkbox('25-40', null, in_array('25-40', $data['sizes'])) }}

            {{ Form::label('40-50', '40 - 50cm:') }}
            {{ Form::checkbox('40-50', null, in_array('40-50', $data['sizes'])) }}

            {{ Form::label('50-75', '50 - 75cm:') }}
            {{ Form::checkbox('50-75', null, in_array('50-75', $data['sizes'])) }}

            {{ Form::label('75-100', '75 - 100cm:') }}
            {{ Form::checkbox('75-100', null, in_array('75-100', $data['sizes'])) }}

            {{ Form::label('100', 'Over 100cm:') }}
            {{ Form::checkbox('100', null, in_array('100', $data['sizes'])) }} <br>

            <h4>Levesteder:</h4>

            {{ Form::label('farmland', 'Agerland:') }}
            {{ Form::checkbox('farmland', null, in_array('farmland', $data['habitats'])) }}

            {{ Form::label('wetland', 'Vådområde:') }}
            {{ Form::checkbox('wetland', null, in_array('wetland', $data['habitats'])) }}

            {{ Form::label('forest', 'Skov og hegn:') }}
            {{ Form::checkbox('forest', null, in_array('forest', $data['habitats'])) }}

            {{ Form::label('moor', 'Hede:') }}
            {{ Form::checkbox('moor', null, in_array('moor', $data['habitats'])) }}

            {{ Form::label('coast', 'Kyst:') }}
            {{ Form::checkbox('coast', null, in_array('coast', $data['habitats'])) }} <br>

            <h4>Farver:</h4>

            {{ Form::label('red', 'Rød:') }}
            {{ Form::checkbox('red', null, in_array('red', $data['colors'])) }}

            {{ Form::label('yellow', 'Gul:') }}
            {{ Form::checkbox('yellow', null, in_array('yellow', $data['colors'])) }}

            {{ Form::label('blue', 'Blå:') }}
            {{ Form::checkbox('blue', null, in_array('blue', $data['colors'])) }}

            {{ Form::label('green', 'Grøn:') }}
            {{ Form::checkbox('green', null, in_array('green', $data['colors'])) }}

            {{ Form::label('brown', 'Brun:') }}
            {{ Form::checkbox('brown', null, in_array('brown', $data['colors'])) }} <br>

            <h4>Billede:</h4>
            {{Form::file('photo')}}

        </div>

            {{ Form::hidden('plantId', $data['plant']->id) }}

        {{ Form::submit('Rediger', array('class' => 'btn btn-default')) }}

        {{ Form::close() }}
    </div>
@stop
