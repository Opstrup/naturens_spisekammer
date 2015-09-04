<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>

        @section('head')
            <style>
                @import url(//fonts.googleapis.com/css?family=Lato:700);

                body {
                    margin:0;
                    font-family:'Lato', sans-serif;
                    color: #999;
                }

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

        <div class="headerText">
            <a href="/">
                <h1>Naturens Spisekammer - Backend</h1> <br>
            </a>
        </div>

        <hr>
        <div class="nav">
                <a href="/">Forside</a>
                <a href="/add-new-recipe">Tilføj ny opskrift</a>
                <a href="/add-new-plant">Tilføj ny plante</a>
                <a href="/about">Om</a>
        </div>
        <hr>

        @yield('body')

    </body>
</html>