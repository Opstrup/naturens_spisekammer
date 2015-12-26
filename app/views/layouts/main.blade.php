<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ Session::token() }}">
        <title>@yield('title')</title>

        @section('head')

            {{ HTML::style('bootstrap/dist/css/bootstrap.min.css') }}
            {{ HTML::style('cropper/dist/cropper.min.css') }}
            {{ HTML::style('css/crop-style.css') }}
            {{ HTML::style('css/dragAndDrop.css') }}
            <style>

                a, a:visited {
                    text-decoration:none;
                }

                h1 {
                    font-size: 32px;
                    margin: 16px 0 0 0;
                }

                .headerText {
                    text-align: right;
                }

                .nav {
                    text-align: center;
                }

                tr:nth-child(even) {
                    background-color: #eee;
                }
                tr:nth-child(odd) {
                    background-color:#fff;
                }

            </style>
        @show
    </head>

    <body>

        <div class="headerText col-md-12">
            <h1>Spis-Danmark</h1><br>
        </div>

        <div class="col-md-12"><hr></div>
        <div class="nav">
                <a href="/">Forside</a> |
                <a href="/add-new-recipe">Tilføj ny opskrift</a> |
                <a href="/add-new-plant">Tilføj ny plante</a> |
                <a href="/add-new-ingredient">Tilføj ny ingridients</a> |
                <a href="/about">Om</a>
        </div>
        <div class="col-md-12"><hr></div>

        @yield('body')
        
        {{ HTML::script('jquery/dist/jquery.min.js') }}
        {{ HTML::script('cropper/dist/cropper.min.js') }}
        {{ HTML::script('dropzone/dist/dropzone.js') }}
        {{ HTML::script('jquery/dist/jquery.js') }}
        {{ HTML::script('cropper/dist/cropper.js') }}
        {{ HTML::script('bootstrap/dist/js/bootstrap.min.js') }}
        {{ HTML::script('js/img-select.js') }}
        {{ HTML::script('js/img-crop.js') }}
        {{ HTML::script('js/dragAndDrop.js') }}
        {{ HTML::script('js/plantDetailView.js') }}
    </body>
</html>