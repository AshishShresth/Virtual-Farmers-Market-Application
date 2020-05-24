<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VFM | The Agricultural Market</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Css -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Styles -->
        <style>
            .welcome-text{
                font-size: 2.1rem;
                font-weight: 900;
                margin-bottom: .9rem;
                text-align: center;
            }
        </style>
    </head>
    <body class="hold-transition login-page" style="background-image: url({{asset('images/agriculture-barley-field-beautiful-close-up-207247.jpg')}}); background-size: cover; background-repeat: no-repeat;">
        <div class="welcome-box">
            <div class="card">
                <div class="card-body">
                    <div class="welcome-text">
                        <p >Virtual <span style="color:#00e765">Farmers'</span> Market</p>
                    </div>
                    <p class="login-box-msg">Sign in to start your session</p>
                    <div class="container">
                        @component('components.who')
                        @endcomponent
                    </div>

                </div>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
