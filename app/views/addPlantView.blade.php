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

                {{ Form::checkbox('herb', 'herb') }}
                {{ Form::label('herb', 'Krydderi') }} <br>

                {{ Form::checkbox('eatable', 'eatable') }}
                {{ Form::label('eatable', 'Spiselig') }} <br>
                <br>
            </div>

            <div class="col-md-5">
                <fieldset>
                    <legend>Sæson:</legend>
                    <ul>
                        <li>
                            {{ Form::checkbox('spring', 'spring') }}
                            {{ Form::label('spring', 'Forår') }}
                        </li>
                        <li>
                            {{ Form::checkbox('summer', 'summer') }}
                            {{ Form::label('summer', 'Sommer') }}
                        </li>
                        <li>
                            {{ Form::checkbox('autumn', 'autumn') }}
                            {{ Form::label('autumn', 'Efterår') }}
                        </li>
                        <li>
                            {{ Form::checkbox('winter', 'winter') }}
                            {{ Form::label('winter', 'Vinter') }}
                        </li>
                    </ul>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Højde:</legend>
                    <ul>
                        <li>
                            {{ Form::checkbox('10', '10') }}
                            {{ Form::label('10', 'Optil 10cm') }}
                        </li>
                        <li>
                            {{ Form::checkbox('10-25', '10-25') }}
                            {{ Form::label('10-25', '10 - 25cm') }}
                        </li>
                        <li>
                            {{ Form::checkbox('25-40', '25-40') }}
                            {{ Form::label('25-40', '25 - 40cm') }}
                        </li>
                        <li>
                            {{ Form::checkbox('40-50', '40-50') }}
                            {{ Form::label('40-50', '40 - 50cm') }}
                        </li>
                        <li>
                            {{ Form::checkbox('50-75', '50-75') }}
                            {{ Form::label('50-75', '50 - 75cm') }}
                        </li>
                        <li>
                            {{ Form::checkbox('75-100', '75-100') }}
                            {{ Form::label('75-100', '75 - 100cm') }}
                        </li>
                        <li>
                            {{ Form::checkbox('100', '100') }}
                            {{ Form::label('100', 'Over 100cm') }}
                        </li>
                    </ul>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Levesteder:</legend>
                    <ul>
                        <li>
                            {{ Form::checkbox('farmland', 'farmland') }}
                            {{ Form::label('farmland', 'Agerland') }}
                        </li>
                        <li>
                            {{ Form::checkbox('wetland', 'wetland') }}
                            {{ Form::label('wetland', 'Vådområde') }}
                        </li>
                        <li>
                            {{ Form::checkbox('forest', 'forest') }}
                            {{ Form::label('forest', 'Skov og hegn') }}
                        </li>
                        <li>
                            {{ Form::checkbox('moor', 'moor') }}
                            {{ Form::label('moor', 'Hede') }}
                        </li>
                        <li>
                            {{ Form::checkbox('coast', 'coast') }}
                            {{ Form::label('coast', 'Kyst') }}
                        </li>
                    </ul>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Farver:</legend>
                    <ul>
                        <li>
                            {{ Form::checkbox('red', 'red') }}
                            {{ Form::label('red', 'Rød') }}
                        </li>
                        <li>
                            {{ Form::checkbox('yellow', 'yellow') }}
                            {{ Form::label('yellow', 'Gul') }}
                        </li>
                        <li>
                            {{ Form::checkbox('blue', 'blue') }}
                            {{ Form::label('blue', 'Blå') }}
                        </li>
                        <li>
                            {{ Form::checkbox('green', 'green') }}
                            {{ Form::label('green', 'Grøn') }}
                        </li>
                        <li>
                            {{ Form::checkbox('brown', 'brown') }}
                            {{ Form::label('brown', 'Brun') }}
                        </li>
                        <li>
                            {{ Form::checkbox('black', 'black') }}
                            {{ Form::label('black', 'Sort') }}
                        </li>
                        <li>
                            {{ Form::checkbox('white', 'white') }}
                            {{ Form::label('white', 'Hvid') }}
                        </li>
                        <li>
                            {{ Form::checkbox('purple', 'purple') }}
                            {{ Form::label('purple', 'Lilla') }}
                        </li>
                        <li>
                            {{ Form::checkbox('orange', 'orange') }}
                            {{ Form::label('orange', 'Orange') }}
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
                {{ Form::submit('Tilføj', array('class' => 'btn btn-default', 'name' => 'addNewPlant')) }}
                <br><br>
            </div>
        {{ Form::close() }}
    </div>
@stop
