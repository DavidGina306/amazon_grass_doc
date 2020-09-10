<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
        <link rel="shortcut icon" href="{{{ asset('images/logo01.png') }}}">

        <style>
            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
            }
            #wrapper{
                min-height: 100%;
                position: relative;
            }
            div.body-content{
              padding-bottom: 100px;
            }
            footer{
                background: #F3F5F4;
                width: 100%;
                height: 50px;
                position: absolute;
                bottom: 2;
                left: 0;
            }
        </style>
        <title>Desmembramento</title>
    </head>
    <body>
        <div id='app'>
        <navbar-menu
            user="{{json_encode($user)}}"
            image="{{{ asset('images/logo01.png') }}}"
            urllogout="{{ route('logout') }}"
            ></navbar-menu>
            <div id="wrapper">
                <div class="container body-content">
                    <page-form
                        user="{{json_encode($user)}}"
                    ></page-form>
                </div>
            </div>
            <page-footer image="{{{ asset('images/logo01.png') }}}"></page-footer>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
