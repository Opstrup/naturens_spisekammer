@extends('layouts.main')

@section('title')
    Tilføj Ny Plante
@stop

@section('body')


    <div class="form-group">

        <div class="col-md-6">

            <div class="page-header">
                <h1>Rediger <small>{{ $data['plant']->name }}</small></h1>
            </div>

        {{ Form::open(array('url' => 'edit-plant', 'method' => 'post', 'files' => true)) }}


            {{ Form::label('name', 'Navn:') }}
            {{ Form::text('name', $data['plant']->name, ['class' => 'form-control']) }} <br>

            {{ Form::label('name_latin', 'Latinsk Navn:') }}
            {{ Form::text('name_latin', $data['plant']->name_latin, ['class' => 'form-control']) }} <br>

            {{ Form::label('description', 'Beskrivelse:') }}
            {{ Form::textarea('description', $data['plant']->description, ['class' => 'form-control']) }} <br>

            {{ Form::label('history', 'Historie:') }}
            {{ Form::textarea('history', $data['plant']->history, ['class' => 'form-control']) }} <br>

            {{ Form::checkbox('herb', null , $data['plant']->herb) }}
            {{ Form::label('herb', 'Krydderi') }} <br>

            {{ Form::checkbox('eatable', null, $data['plant']->eatable) }}
            {{ Form::label('eatable', 'Spiselig') }}  <br>
            <br>
        </div>
        <div class="col-md-5" style="margin-top: 80px;">
            <fieldset>
                <legend>Sæson:</legend>
                <ul>
                    <li>
                        {{ Form::checkbox('spring', null, in_array('spring', $data['seasons'])) }}
                        {{ Form::label('spring', 'Forår') }}
                    </li>
                    <li>
                        {{ Form::checkbox('summer', null, in_array('summer', $data['seasons'])) }}
                        {{ Form::label('summer', 'Sommer') }}
                    </li>
                    <li>
                        {{ Form::checkbox('autumn', null, in_array('autumn', $data['seasons'])) }}
                        {{ Form::label('autumn', 'Efterår') }}
                    </li>
                    <li>
                        {{ Form::checkbox('winter', null, in_array('winter', $data['seasons'])) }}
                        {{ Form::label('winter', 'Vinter') }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Højde:</legend>
                <ul>
                    <li>
                        {{ Form::checkbox('10', null, in_array('10', $data['sizes'])) }}
                        {{ Form::label('10', 'Optil 10cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('10-25', null, in_array('10-25', $data['sizes'])) }}
                        {{ Form::label('10-25', '10 - 25cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('25-40', null, in_array('25-40', $data['sizes'])) }}
                        {{ Form::label('25-40', '25 - 40cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('40-50', null, in_array('40-50', $data['sizes'])) }}
                        {{ Form::label('40-50', '40 - 50cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('50-75', null, in_array('50-75', $data['sizes'])) }}
                        {{ Form::label('50-75', '50 - 75cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('75-100', null, in_array('75-100', $data['sizes'])) }}
                        {{ Form::label('75-100', '75 - 100cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('100', null, in_array('100', $data['sizes'])) }}
                        {{ Form::label('100', 'Over 100cm') }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Levesteder:</legend>
                <ul>
                    <li>
                        {{ Form::checkbox('farmland', null, in_array('farmland', $data['habitats'])) }}
                        {{ Form::label('farmland', 'Agerland') }}
                    </li>
                    <li>
                        {{ Form::checkbox('wetland', null, in_array('wetland', $data['habitats'])) }}
                        {{ Form::label('wetland', 'Vådområde') }}
                    </li>
                    <li>
                        {{ Form::checkbox('forest', null, in_array('forest', $data['habitats'])) }}
                        {{ Form::label('forest', 'Skov og hegn') }}
                    </li>
                    <li>
                        {{ Form::checkbox('moor', null, in_array('moor', $data['habitats'])) }}
                        {{ Form::label('moor', 'Hede') }}
                    </li>
                    <li>
                        {{ Form::checkbox('coast', null, in_array('coast', $data['habitats'])) }}
                        {{ Form::label('coast', 'Kyst') }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Farver:</legend>
                <ul>
                    <li>
                        {{ Form::checkbox('red', null, in_array('red', $data['colors'])) }}
                        {{ Form::label('red', 'Rød') }}
                    </li>
                    <li>
                        {{ Form::checkbox('yellow', null, in_array('yellow', $data['colors'])) }}
                        {{ Form::label('yellow', 'Gul') }}
                    </li>
                    <li>
                        {{ Form::checkbox('blue', null, in_array('blue', $data['colors'])) }}
                        {{ Form::label('blue', 'Blå') }}
                    </li>
                    <li>
                        {{ Form::checkbox('green', null, in_array('green', $data['colors'])) }}
                        {{ Form::label('green', 'Grøn') }}
                    </li>
                    <li>
                        {{ Form::checkbox('brown', null, in_array('brown', $data['colors'])) }}
                        {{ Form::label('brown', 'Brun') }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Billeder:</legend>

                @for($i = 0; $i < 4; $i++)
                    @if($data['photos'][$i] != 'null')
                        <div class="col-md-5">
                            <a href={{ url($data['photos'][$i]) }} class="thumbnail" style="width: 133px; height: 200px;">
                                <img src={{ url($data['photos'][$i]) }} class="img-rounded">
                            </a>

                            {{ Form::label('delete', 'Slet billede:') }}
                            {{ Form::checkbox($i) }}
                        </div>
                    @else
                        <div class="col-md-5">
                            <a href="http://placehold.it/266x400" class="thumbnail" style="width: 133px; height: 200px;">
                                <img src="http://placehold.it/266x400" class="img-rounded">
                            </a>

                            {{ Form::file('photo_' . $i) }}
                        </div>
                    @endif
                @endfor
            </fieldset>
        </div>

            {{ Form::hidden('plantId', $data['plant']->id) }}

        <div class="col-md-1 col-md-offset-5">
            {{ Form::submit('Gem', array('class' => 'btn btn-default', 'name' => 'save')) }}
        </div>

        {{ Form::close() }}
    </div>
@stop
