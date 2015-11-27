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

            <br>

            <fieldset>
                <legend>Anvendelse:</legend>
                <ul>
                    <li>
                        {{ Form::checkbox('herb', 'herb', in_array('Krydderi', $data['applications'])) }}
                        {{ Form::label('herb', 'Krydderi') }}
                    </li>
                    <li>
                        {{ Form::checkbox('thee', 'thee', in_array('The', $data['applications'])) }}
                        {{ Form::label('thee', 'The') }}
                    </li>
                    <li>
                        {{ Form::checkbox('schnapps', 'schnapps', in_array('Snaps', $data['applications'])) }}
                        {{ Form::label('schnapps', 'Snaps') }}
                    </li>
                    <li>
                        {{ Form::checkbox('pickled', 'pickled', in_array('Sylte', $data['applications'])) }}
                        {{ Form::label('pickled', 'Sylte') }}
                    </li>
                    <li>
                        {{ Form::checkbox('firefood', 'firefood', in_array('Bålmad', $data['applications'])) }}
                        {{ Form::label('firefood', 'Bålmad') }}
                    </li>
                    <li>
                        {{ Form::checkbox('pot', 'pot', in_array('Gryderet', $data['applications'])) }}
                        {{ Form::label('pot', 'Gryderet') }}
                    </li>
                    <li>
                        {{ Form::checkbox('juice', 'juice', in_array('Saft', $data['applications'])) }}
                        {{ Form::label('juice', 'Saft') }}
                    </li>
                    <li>
                        {{ Form::checkbox('soup', 'soup', in_array('Suppe', $data['applications'])) }}
                        {{ Form::label('soup', 'Suppe') }}
                    </li>
                    <li>
                        {{ Form::checkbox('salad', 'salad', in_array('Salat', $data['applications'])) }}
                        {{ Form::label('salad', 'Salat') }}
                    </li>
                    <li>
                        {{ Form::checkbox('dessert', 'dessert', in_array('Dessert', $data['applications'])) }}
                        {{ Form::label('dessert', 'Dessert') }}
                    </li>
                    <li>
                        {{ Form::checkbox('snack', 'snack', in_array('Snack', $data['applications'])) }}
                        {{ Form::label('snack', 'Snack') }}
                    </li>
                </ul>
            </fieldset>
        </div>
        <div class="col-md-5" style="margin-top: 80px;">
            <fieldset>
                <legend>Sæson:</legend>
                <ul>
                    <li>
                        {{ Form::checkbox('spring', 'spring', in_array('Forår', $data['seasons'])) }}
                        {{ Form::label('spring', 'Forår') }}
                    </li>
                    <li>
                        {{ Form::checkbox('summer', 'summer', in_array('Sommer', $data['seasons'])) }}
                        {{ Form::label('summer', 'Sommer') }}
                    </li>
                    <li>
                        {{ Form::checkbox('autumn', 'autumn', in_array('Efterår', $data['seasons'])) }}
                        {{ Form::label('autumn', 'Efterår') }}
                    </li>
                    <li>
                        {{ Form::checkbox('winter', 'winter', in_array('Vinter', $data['seasons'])) }}
                        {{ Form::label('winter', 'Vinter') }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Højde:</legend>
                <ul>
                    <li>
                        {{ Form::checkbox('10', '10', in_array('10', $data['sizes'])) }}
                        {{ Form::label('10', 'Optil 10cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('10-25', '10-25', in_array('10-25', $data['sizes'])) }}
                        {{ Form::label('10-25', '10 - 25cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('25-40', '25-40', in_array('25-40', $data['sizes'])) }}
                        {{ Form::label('25-40', '25 - 40cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('40-50', '40-50', in_array('40-50', $data['sizes'])) }}
                        {{ Form::label('40-50', '40 - 50cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('50-75', '50-75', in_array('50-75', $data['sizes'])) }}
                        {{ Form::label('50-75', '50 - 75cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('75-100', '75-100', in_array('75-100', $data['sizes'])) }}
                        {{ Form::label('75-100', '75 - 100cm') }}
                    </li>
                    <li>
                        {{ Form::checkbox('100', '100', in_array('100', $data['sizes'])) }}
                        {{ Form::label('100', 'Over 100cm') }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Levesteder:</legend>
                <ul>
                    <li>
                        {{ Form::checkbox('farmland', 'farmland', in_array('Agerland', $data['habitats'])) }}
                        {{ Form::label('farmland', 'Agerland') }}
                    </li>
                    <li>
                        {{ Form::checkbox('wetland', 'wetland', in_array('Vådområde', $data['habitats'])) }}
                        {{ Form::label('wetland', 'Vådområde') }}
                    </li>
                    <li>
                        {{ Form::checkbox('forest', 'forest', in_array('Skov og hegn', $data['habitats'])) }}
                        {{ Form::label('forest', 'Skov og hegn') }}
                    </li>
                    <li>
                        {{ Form::checkbox('moor', 'moor', in_array('Hede', $data['habitats'])) }}
                        {{ Form::label('moor', 'Hede') }}
                    </li>
                    <li>
                        {{ Form::checkbox('coast', 'coast', in_array('Kyst', $data['habitats'])) }}
                        {{ Form::label('coast', 'Kyst') }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Farver:</legend>
                <ul>
                    <li>
                        {{ Form::checkbox('red', 'red', in_array('rød', $data['colors'])) }}
                        {{ Form::label('red', 'Rød') }}
                    </li>
                    <li>
                        {{ Form::checkbox('yellow', 'yellow', in_array('gul', $data['colors'])) }}
                        {{ Form::label('yellow', 'Gul') }}
                    </li>
                    <li>
                        {{ Form::checkbox('blue', 'blue', in_array('blå', $data['colors'])) }}
                        {{ Form::label('blue', 'Blå') }}
                    </li>
                    <li>
                        {{ Form::checkbox('green', 'green', in_array('grøn', $data['colors'])) }}
                        {{ Form::label('green', 'Grøn') }}
                    </li>
                    <li>
                        {{ Form::checkbox('brown', 'brown', in_array('brun', $data['colors'])) }}
                        {{ Form::label('brown', 'Brun') }}
                    </li>
                    <li>
                        {{ Form::checkbox('black', 'black', in_array('sort', $data['colors'])) }}
                        {{ Form::label('black', 'Sort') }}
                    </li>
                    <li>
                        {{ Form::checkbox('white', 'white', in_array('hvid', $data['colors'])) }}
                        {{ Form::label('white', 'Hvid') }}
                    </li>
                    <li>
                        {{ Form::checkbox('purple', 'purple', in_array('lilla', $data['colors'])) }}
                        {{ Form::label('purple', 'Lilla') }}
                    </li>
                    <li>
                        {{ Form::checkbox('orange', 'orange', in_array('orange', $data['colors'])) }}
                        {{ Form::label('orange', 'Orange') }}
                    </li>
                </ul>
            </fieldset>
            <br>

            <fieldset>
                <legend>Billeder:</legend>

                @for($i = 0; $i < 4; $i++)
                    @if($data['photos'][$i] != 'null')
                        <div class="col-md-5">
                            <a href={{ url($data['photos'][$i]) }} class="thumbnail" style="width: 133px; height: 230px;">
                                <img src={{ url($data['photos'][$i]) }} class="img-rounded">
                            </a>

                            {{ Form::label('delete', 'Slet billede:') }}
                            {{ Form::checkbox($i) }}
                        </div>
                    @else
                        <div class="col-md-5">
                            <a href="http://placehold.it/266x470" class="thumbnail" style="width: 133px; height: 230px;">
                                <img src="http://placehold.it/266x470" class="img-rounded">
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
