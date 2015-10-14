@extends('layouts.main')

@section('title')
    Tilføj Ny Plante
@stop

@section('body')

    <h2>Tilføj ny plante til databasen</h2>

    <div class="col-md-5">

        {{ Form::open(array('url' => 'add-new-plant', 'method' => 'post', 'files' => true)) }}

        <div class="form-group">

            {{ Form::label('name', 'Navn:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }} <br>

            {{ Form::label('name_latin', 'Latinsk Navn:') }}
            {{ Form::text('name_latin', null, ['class' => 'form-control']) }} <br>

            {{ Form::label('description', 'Beskrivelse:') }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }} <br>

            {{ Form::label('history', 'Historie:') }}
            {{ Form::textarea('history', null, ['class' => 'form-control']) }} <br>

            {{ Form::label('herb', 'Krydderi:') }}
            {{ Form::checkbox('herb') }} <br>

            {{ Form::label('eatable', 'Spiselig:') }}
            {{ Form::checkbox('eatable') }} <br>

            <h4>Sæson:</h4>

            {{ Form::label('spring', 'Forår:') }}
            {{ Form::checkbox('spring') }}

            {{ Form::label('summer', 'Sommer:') }}
            {{ Form::checkbox('summer') }}

            {{ Form::label('autumn', 'Efterår:') }}
            {{ Form::checkbox('autumn') }}

            {{ Form::label('winter', 'Vinter:') }}
            {{ Form::checkbox('winter') }} <br>

            <h4>Højde:</h4>

            {{ Form::label('10', 'Optil 10cm:') }}
            {{ Form::checkbox('10') }}

            {{ Form::label('10-25', '10 - 25cm:') }}
            {{ Form::checkbox('10-25') }}

            {{ Form::label('25-40', '25 - 40cm:') }}
            {{ Form::checkbox('25-40') }}

            {{ Form::label('40-50', '40 - 50cm:') }}
            {{ Form::checkbox('40-50') }}

            {{ Form::label('50-75', '50 - 75cm:') }}
            {{ Form::checkbox('50-75') }}

            {{ Form::label('75-100', '75 - 100cm:') }}
            {{ Form::checkbox('75-100') }}

            {{ Form::label('100', 'Over 100cm:') }}
            {{ Form::checkbox('100') }} <br>

            <h4>Levesteder:</h4>

            {{ Form::label('farmland', 'Agerland:') }}
            {{ Form::checkbox('farmland') }}

            {{ Form::label('wetland', 'Vådområde:') }}
            {{ Form::checkbox('wetland') }}

            {{ Form::label('forest', 'Skov og hegn:') }}
            {{ Form::checkbox('forest') }}

            {{ Form::label('moor', 'Hede:') }}
            {{ Form::checkbox('moor') }}

            {{ Form::label('coast', 'Kyst:') }}
            {{ Form::checkbox('coast') }} <br>

            <h4>Farver:</h4>

            {{ Form::label('red', 'Rød:') }}
            {{ Form::checkbox('red') }}

            {{ Form::label('yellow', 'Gul:') }}
            {{ Form::checkbox('yellow') }}

            {{ Form::label('blue', 'Blå:') }}
            {{ Form::checkbox('blue') }}

            {{ Form::label('green', 'Grøn:') }}
            {{ Form::checkbox('green') }}

            {{ Form::label('brown', 'Brun:') }}
            {{ Form::checkbox('brown') }} <br>

            <h4>Billeder:</h4>
            {{Form::file('photo_0')}}
            {{Form::file('photo_1')}}
            {{Form::file('photo_2')}}
            {{Form::file('photo_3')}}

        </div>

        {{ Form::submit('Tilføj', array('class' => 'btn btn-default')) }}

        {{ Form::close() }}
    </div>
@stop
