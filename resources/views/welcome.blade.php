<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Converter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            P {
              color: #181919;
              font-weight: 300 !important;
              font-family: 'Roboto', sans-serif;
              font-size: 16px;

            }
            h4 {
              font-weight: 300 !important;
              font-family: 'Roboto', sans-serif;
            }


            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;

                font-size: 16px;
                font-weight: 600;

            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Converter
                </div>

                <div class="links">
                    <a href="/convert" class="btn btn-primary">Convert</a>
                    <a href="/convert/recent" class="btn btn-info">Recent Conversions</a>
                    <a href="/convert/top" class="btn btn-success">Top 10 Numerals</a>
                </div>
                <hr />
                <u><h3>Using the Converter:</h3></u>
                <p>1. Click on the Convert button above and enter a number between 1 and 3999 to convert it into a Roman Numeral.</p>
                <p>2. Click on the Recent conversions button above to view all the recent Roman Numeral conversions.</p>
                <p>3. Click on the  TOP10 button above to view the top 10 popular Roman Numerals.</p>
                <hr />
                <h3>Using the API:</h3>
                <u><b><h4>Convert Integer to Numeral and recieve Json</h4></b></u>
                <p>1. Enter the URL : http://127.0.0.1:8000/api/convert/YourIntegerHere</p>
                <p>For Example : http://127.0.0.1:8000/api/convert/1280</p>
                <u><b><h4>View recent Numeral conversions in Json</h4></b></u>
                <p>1. Enter the URL : http://127.0.0.1:8000/api/recent</p>
                <u><b><h4>View top 10 Numerals in Json</h4></b></u>
                <p>1. Enter the URL : http://127.0.0.1:8000/api/top</p>

            </div>
        </div>
    </body>
</html>
