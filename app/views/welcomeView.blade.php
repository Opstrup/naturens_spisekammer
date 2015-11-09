@extends('layouts.main')

@section('title')
    Welcome to Spis-Danmark - Backend
@stop

@section('body')

    <div class="col-md-12 col-md-offset-1">
        <h1>Velkommen til Spis-Danmark - Backend</h1>
    </div>

    <div class="col-md-12"><hr></div>
    <div id="plantTable" class="col-md-5">
        <p>Antal planter i systemet: <?php echo sizeof($data['plants']) ?></p>

        <table class="table table-hover">
            <caption>List af planter</caption>
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="40%">Navn</th>
                    <th width="35%">Navn latin</th>
                    <th width="5%">Krydderi</th>
                    <th width="5%">Spiselig</th>
                    <th width="15%">Mere</th>
                </tr>
            </thead>
        </table>

        <div id="table-scroll">
            <table class="table table-hover">

                <tbody>
                    @foreach($data['plants'] as $plant)
                        <tr id="{{ $plant->id }}">
                            <td width="5%">{{ $plant->id }}</td>
                            <td width="30%">{{ $plant->name }}</td>
                            <td width="30%">{{ $plant->name_latin }}</td>

                            @if($plant->herb)
                                <td width="5%">Ja</td>
                            @else
                                <td width="5%">Nej</td>
                            @endif

                            @if($plant->eatable)
                                <td width="5%">Ja</td>
                            @else
                                <td width="5%">Nej</td>
                            @endif

                            <td width="15%">
                                <a href="/plant-detail/{{ $plant->id }}">Mere..</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <div class="col-md-1"></div>

    <div id="recipeTable" class="col-md-5">
        <p>Antal opskrifter i systemet: <?php echo sizeof($data['recipes']) ?></p>

        <table class="table table-hover">
            <caption>Liste af opskrifter</caption>
            <thead>
            <tr>
                <th>ID</th>
                <th>Navn</th>
                <th>Type</th>
                <th>Mere</th>
            </tr>
            </thead>
        </table>

        <div id="table-scroll">
            <table class="table table-hover">
                <tbody>
                    @foreach($data['recipes'] as $recipe)
                    <tr>
                        <td>{{ $recipe->id }}</td>
                        <td>{{ $recipe->name }}</td>
                        <td>{{ $recipe->type }}</td>
                        <td>
                            <a href="/recipe-detail/{{ $recipe->id }}">Mere..</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop