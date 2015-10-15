@extends('layouts.main')

@section('title')
    Tilføj Ny Plante
@stop

@section('body')

    <h2>Tilføj ny plante til databasen</h2>

    <div class="form-group">


        {{ Form::open(array('url' => 'add-new-plant', 'method' => 'post', 'files' => true)) }}

            <div class="col-md-6">

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
                <br>
            </div>

            <div class="col-md-5">
                <fieldset>
                    <legend>Sæson:</legend>
                    <ul>
                        <li>
                            {{ Form::label('spring', 'Forår:') }}
                            {{ Form::checkbox('spring') }}
                        </li>
                        <li>
                            {{ Form::label('summer', 'Sommer:') }}
                            {{ Form::checkbox('summer') }}
                        </li>
                        <li>
                            {{ Form::label('autumn', 'Efterår:') }}
                            {{ Form::checkbox('autumn') }}
                        </li>
                        <li>
                            {{ Form::label('winter', 'Vinter:') }}
                            {{ Form::checkbox('winter') }}
                        </li>
                    </ul>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Højde:</legend>
                    <ul>
                        <li>
                            {{ Form::label('10', 'Optil 10cm:') }}
                            {{ Form::checkbox('10') }}
                        </li>
                        <li>
                            {{ Form::label('10-25', '10 - 25cm:') }}
                            {{ Form::checkbox('10-25') }}
                        </li>
                        <li>
                            {{ Form::label('25-40', '25 - 40cm:') }}
                            {{ Form::checkbox('25-40') }}
                        </li>
                        <li>
                            {{ Form::label('40-50', '40 - 50cm:') }}
                            {{ Form::checkbox('40-50') }}
                        </li>
                        <li>
                            {{ Form::label('50-75', '50 - 75cm:') }}
                            {{ Form::checkbox('50-75') }}
                        </li>
                        <li>
                            {{ Form::label('75-100', '75 - 100cm:') }}
                            {{ Form::checkbox('75-100') }}
                        </li>
                        <li>
                            {{ Form::label('100', 'Over 100cm:') }}
                            {{ Form::checkbox('100') }}
                        </li>
                    </ul>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Levesteder:</legend>
                    <ul>
                        <li>
                            {{ Form::label('farmland', 'Agerland:') }}
                            {{ Form::checkbox('farmland') }}
                        </li>
                        <li>
                            {{ Form::label('wetland', 'Vådområde:') }}
                            {{ Form::checkbox('wetland') }}
                        </li>
                        <li>
                            {{ Form::label('forest', 'Skov og hegn:') }}
                            {{ Form::checkbox('forest') }}
                        </li>
                        <li>
                            {{ Form::label('moor', 'Hede:') }}
                            {{ Form::checkbox('moor') }}
                        </li>
                        <li>
                            {{ Form::label('coast', 'Kyst:') }}
                            {{ Form::checkbox('coast') }}
                        </li>
                    </ul>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Farver:</legend>
                    <ul>
                        <li>
                            {{ Form::label('red', 'Rød:') }}
                            {{ Form::checkbox('red') }}
                        </li>
                        <li>
                            {{ Form::label('yellow', 'Gul:') }}
                            {{ Form::checkbox('yellow') }}
                        </li>
                        <li>
                            {{ Form::label('blue', 'Blå:') }}
                            {{ Form::checkbox('blue') }}
                        </li>
                        <li>
                            {{ Form::label('green', 'Grøn:') }}
                            {{ Form::checkbox('green') }}
                        </li>
                        <li>
                            {{ Form::label('brown', 'Brun:') }}
                            {{ Form::checkbox('brown') }}
                        </li>
                    </ul>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Billeder:</legend>
                    @for($i = 0; $i < 4; $i++)
                        {{ Form::file('photo_' . $i) }}
                    @endfor
                </fieldset>
            </div>

            <div class="col-md-1 col-md-offset-5">
                {{ Form::submit('Tilføj', array('class' => 'btn btn-default')) }}
            </div>
        {{ Form::close() }}
    </div>
@stop
