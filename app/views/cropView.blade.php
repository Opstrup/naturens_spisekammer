@extends('layouts.main')

@section('title')
    Beskær billeder
@stop

@section('body')

    <div class="col-md-6">
        <h1>Beskær billeder</h1>
    </div>

    <div class="col-md-12">
        <br>
        <div id="crop-pictures">
            @foreach($data['photos'] as $id => $photo)
                @if($photo == 'null')
                    <img id="photo_{{ $id }}" src="http://placehold.it/266x470" class="img-rounded small-crop-photo">
                @else
                    <img id="photo_{{ $id }}" src="{{ $photo }}" class="img-rounded small-crop-photo">
                @endif
            @endforeach

            <div style="float: left; margin-left: 10px">
                {{ Form::open(array('url' => 'crop-photos', 'method' => 'post')) }}
                    {{ Form::hidden('plantID', $data['plantID']) }}
                    {{ Form::hidden('photo_0x', null, array('id' => 'photo_0x')) }}
                    {{ Form::hidden('photo_0y', null, array('id' => 'photo_0y')) }}
                    {{ Form::hidden('photo_1x', null, array('id' => 'photo_1x')) }}
                    {{ Form::hidden('photo_1y', null, array('id' => 'photo_1y')) }}
                    {{ Form::hidden('photo_2x', null, array('id' => 'photo_2x')) }}
                    {{ Form::hidden('photo_2y', null, array('id' => 'photo_2y')) }}
                    {{ Form::hidden('photo_3x', null, array('id' => 'photo_3x')) }}
                    {{ Form::hidden('photo_3y', null, array('id' => 'photo_3y')) }}
                    {{ Form::submit('Gem', array('class' => 'btn btn-default', 'name' => 'save')) }}
                {{ Form::close() }}
            </div>

            <a class="btn btn-default" href="/plant-detail/{{ $data['plantID'] }}" role="button" style="float: left; margin-left: 70px">Spring over</a>

        </div>

        <div id="croppingArea">
            <img class="full-size-img" src="{{ $data['photos'][0] }}" id="photo_0"/>
        </div>

        <div id="preview">
            {{--This holds the preview picture--}}
        </div>

        <div id="buttons">
            <button style="display: inline-block;" id="crop">Beskær</button>
            {{--<button style="display: inline-block;" id="zoomIn">+</button>
            <button style="display: inline-block;" id="zoomOut">-</button>--}}
        </div>

        <div id="cropped-pictures">
            <p>Beskåret billeder:</p>
        </div>
    </div>

@stop

