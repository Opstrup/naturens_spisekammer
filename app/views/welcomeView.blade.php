@extends('layouts.main')

@section('title')
    Welcome to Spis-Danmark - Backend
@stop

@section('body')

    <div class="col-md-6">
        <h1>Velkommen til Spis-Danmark - Backend</h1>
    </div>

    <div class="col-md-12"><hr></div>
    <div id="plantTable" class="col-md-5">
        <p>Antal planter i systemet: <?php echo sizeof($data['plants']) ?></p>

        <table class="table table-hover" style="margin-bottom: -1px">
            <caption>List af planter</caption>
            <thead>
                <tr>
                    <th width="200px">Navn</th>
                    <th width="150px">Navn latin</th>
                    <th width="80px">Krydderi</th>
                    <th width="80px">Spiselig</th>
                    <th width="10px">Mere</th>
                </tr>
            </thead>
        </table>

        <div style="overflow: auto; height: 350px;">
            <table class="table table-hover">
                <tbody>
                    @foreach($data['plants'] as $plant)
                        <tr id="{{ $plant->id }}">
                            <td width="200px">{{ $plant->name }}</td>
                            <td width="150px">{{ $plant->name_latin }}</td>

                            @if($plant->herb)
                                <td width="80px">Ja</td>
                            @else
                                <td width="80px">Nej</td>
                            @endif

                            @if($plant->eatable)
                                <td width="80px">Ja</td>
                            @else
                                <td width="80px">Nej</td>
                            @endif

                            <td width="10px">
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

        <table class="table table-hover" style="margin-bottom: -1px">
            <caption>Liste af opskrifter</caption>
            <thead>
            <tr>
                <th width="280px">Navn</th>
                <th width="210px">Type</th>
                <th width="20px">Mere</th>
            </tr>
            </thead>
        </table>

        <div style="overflow: auto; height: 350px;">
            <table class="table table-hover">
                <tbody>
                    @foreach($data['recipes'] as $recipe)
                    <tr>
                        <td width="280px">{{ $recipe->name }}</td>
                        <td width="210px">{{ $recipe->type }}</td>
                        <td width="20px">
                            <a href="/recipe-detail/{{ $recipe->id }}">Mere..</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop