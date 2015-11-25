<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php

        //set headers to NOT cache a page
        /*header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
        header("Pragma: no-cache"); //HTTP 1.0
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past*/

        /*header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

        header('Cache-Control: no-store, no-cache, must-revalidate');

        header('Cache-Control: post-check=0, pre-check=0', FALSE);

        header('Pragma: no-cache');*/

        /*header("Pragma-directive: no-cache");
        header("Cache-directive: no-cache");
        header("Cache-control: no-cache");
        header("Pragma: no-cache");
        header("Expires: 0");*/

        ?>
        <title>@yield('title')</title>

        @section('head')

            {{ HTML::style('bootstrap/dist/css/bootstrap.min.css') }}
            {{ HTML::style('cropper/dist/cropper.css') }}
            {{ HTML::style('css/crop-style.css') }}
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

        {{ HTML::script('jquery/dist/jquery.js') }}
        {{ HTML::script('cropper/dist/cropper.js') }}
        {{ HTML::script('bootstrap/dist/js/bootstrap.min.js') }}
        {{ HTML::script('js/img-select.js') }}
        {{ HTML::script('js/img-crop.js') }}
    </body>
</html>