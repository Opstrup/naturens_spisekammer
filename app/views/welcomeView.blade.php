@extends('layouts.main')

@section('title')
    Welcome to Spis-Danmark - Backend
@stop

@section('body')

    <div class="col-md-12 col-md-offset-1">
        <h1>Velkommen til Spis-Danmark - Backend</h1>
        <h2>Test med github 15:07</h2>
    </div>

    <div class="col-md-12"><hr></div>
    <div id="plantTable" class="col-md-5">
        <p>Antal planter i systemet: <?php echo sizeof($data['plants']) ?></p>

        <table class="table table-hover">
            <caption>List af planter</caption>
            <tr>
                <th>ID</th>
                <th>Navn</th>
                <th>Navn latin</th>
                <th>Krydderi</th>
                <th>Spiselig</th>
                <th>Mere</th>
            </tr>

            @foreach($data['plants'] as $plant)
                <tr id="{{ $plant->id }}">
                    <td>{{ $plant->id }}</td>
                    <td>{{ $plant->name }}</td>
                    <td>{{ $plant->name_latin }}</td>

                    @if($plant->herb)
                        <td>Ja</td>
                    @else
                        <td>Nej</td>
                    @endif

                    @if($plant->eatable)
                        <td>Ja</td>
                    @else
                        <td>Nej</td>
                    @endif

                    <td>
                        <a href="/plant-detail/{{ $plant->id }}">Mere..</a>
                    </td>

                </tr>
            @endforeach

        </table>
    </div>

    <div class="col-md-1"></div>

    <div id="recipeTable" class="col-md-5">
        <p>Antal opskrifter i systemet: <?php echo sizeof($data['recipes']) ?></p>

        <table class="table table-hover">
            <caption>Liste af opskrifter</caption>
            <tr>
                <th>ID</th>
                <th>Navn</th>
                <th>Type</th>
                <th>Mere</th>
            </tr>

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

        </table>
    </div>

@stop