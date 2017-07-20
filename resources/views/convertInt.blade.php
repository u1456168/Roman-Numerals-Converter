<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
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

                <div class="row">
                </div>
                <div class="col-lg-6">
                  <form method="POST" action="/convert/search">
                      {{ csrf_field()}}
                      <div class="input-group">
                        <input type="text" class="form-control" name="searchValue" placeholder="Enter Integer...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Convert!</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </body>
</html>
