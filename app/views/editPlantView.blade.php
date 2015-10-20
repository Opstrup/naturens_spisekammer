@extends('layouts.main')

@section('title')
    Tilføj Ny Plante
@stop

@section('body')

    <h2>Rediger {{$data['plant']->name}}</h2>

    <div class="form-group">


        {{ Form::open(array('url' => 'edit-plant', 'method' => 'post', 'files' => true)) }}

        <div class="col-md-6">

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
            <br>
        </div>
        <div class="col-md-5">
            <fieldset>
                <legend>Sæson:</legend>
                <ul>
                    <li>
                        {{ Form::label('spring', 'Forår:') }}
                        {{ Form::checkbox('spring', null, in_array('spring', $data['seasons'])) }}
                    </li>
                    <li>
                        {{ Form::label('summer', 'Sommer:') }}
                        {{ Form::checkbox('summer', null, in_array('summer', $data['seasons'])) }}
                    </li>
                    <li>
                        {{ Form::label('autumn', 'Efterår:') }}
                        {{ Form::checkbox('autumn', null, in_array('autumn', $data['seasons'])) }}
                    </li>
                    <li>
                        {{ Form::label('winter', 'Vinter:') }}
                        {{ Form::checkbox('winter', null, in_array('winter', $data['seasons'])) }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Højde:</legend>
                <ul>
                    <li>
                        {{ Form::label('10', 'Optil 10cm:') }}
                        {{ Form::checkbox('10', null, in_array('10', $data['sizes'])) }}
                    </li>
                    <li>
                        {{ Form::label('10-25', '10 - 25cm:') }}
                        {{ Form::checkbox('10-25', null, in_array('10-25', $data['sizes'])) }}
                    </li>
                    <li>
                        {{ Form::label('25-40', '25 - 40cm:') }}
                        {{ Form::checkbox('25-40', null, in_array('25-40', $data['sizes'])) }}
                    </li>
                    <li>
                        {{ Form::label('40-50', '40 - 50cm:') }}
                        {{ Form::checkbox('40-50', null, in_array('40-50', $data['sizes'])) }}
                    </li>
                    <li>
                        {{ Form::label('50-75', '50 - 75cm:') }}
                        {{ Form::checkbox('50-75', null, in_array('50-75', $data['sizes'])) }}
                    </li>
                    <li>
                        {{ Form::label('75-100', '75 - 100cm:') }}
                        {{ Form::checkbox('75-100', null, in_array('75-100', $data['sizes'])) }}
                    </li>
                    <li>
                        {{ Form::label('100', 'Over 100cm:') }}
                        {{ Form::checkbox('100', null, in_array('100', $data['sizes'])) }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Levesteder:</legend>
                <ul>
                    <li>
                        {{ Form::label('farmland', 'Agerland:') }}
                        {{ Form::checkbox('farmland', null, in_array('farmland', $data['habitats'])) }}
                    </li>
                    <li>
                        {{ Form::label('wetland', 'Vådområde:') }}
                        {{ Form::checkbox('wetland', null, in_array('wetland', $data['habitats'])) }}
                    </li>
                    <li>
                        {{ Form::label('forest', 'Skov og hegn:') }}
                        {{ Form::checkbox('forest', null, in_array('forest', $data['habitats'])) }}
                    </li>
                    <li>
                        {{ Form::label('moor', 'Hede:') }}
                        {{ Form::checkbox('moor', null, in_array('moor', $data['habitats'])) }}
                    </li>
                    <li>
                        {{ Form::label('coast', 'Kyst:') }}
                        {{ Form::checkbox('coast', null, in_array('coast', $data['habitats'])) }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Farver:</legend>
                <ul>
                    <li>
                        {{ Form::label('red', 'Rød:') }}
                        {{ Form::checkbox('red', null, in_array('red', $data['colors'])) }}
                    </li>
                    <li>
                        {{ Form::label('yellow', 'Gul:') }}
                        {{ Form::checkbox('yellow', null, in_array('yellow', $data['colors'])) }}
                    </li>
                    <li>
                        {{ Form::label('blue', 'Blå:') }}
                        {{ Form::checkbox('blue', null, in_array('blue', $data['colors'])) }}
                    </li>
                    <li>
                        {{ Form::label('green', 'Grøn:') }}
                        {{ Form::checkbox('green', null, in_array('green', $data['colors'])) }}
                    </li>
                    <li>
                        {{ Form::label('brown', 'Brun:') }}
                        {{ Form::checkbox('brown', null, in_array('brown', $data['colors'])) }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Billeder:</legend>

                @for($i = 0; $i < 4; $i++)
                    @if($data['photos'][$i] != 'null')
                        <div class="col-md-4">
                            <a href={{ url($data['photos'][$i]) }} class="thumbnail" style="width: 133px; height: 200px;">
                                <img src={{ url($data['photos'][$i]) }} class="img-rounded">
                            </a>
                            {{ Form::label('delete', 'Slet billede:') }}
                            {{ Form::checkbox($i) }} <br>
                        </div>
                    @endif
                @endfor
                <br>
                @for($i = 0; $i < 4; $i++)
                    @if($data['photos'][$i] == 'null')
                        {{ Form::file('photo_' . $i) }}
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
