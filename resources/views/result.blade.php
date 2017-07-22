<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Converter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
            .result {
                font-size: 84px;
                font-weight: 400;
                font-family: 'Roboto', sans-serif;
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


            <div class="content">
                <div class="title m-b-md">
                    Roman Numerals Converter
                </div>

                <div class="searchBox">
                  <h2>
                    Search an Integer to convert..
                  </h2>
                </div>

                <p>
                  <b>
                  You Searched for {{$SearchVal}}. The Roman Numeral Conversion is : </p></b>

                  <div class="result m-b-md">
                    {{$RomanNum}}
                  </div>

              </div>
            </div>
        </div>
    </body>
</html>
