<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>404</title>
        <link rel="shortcut icon" href="/images/logo/favicon.png" />

        <link rel="stylesheet" href="{{mix('/css/app.css')}}">

        <style>
            @import url('https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700');


            body{
                background: url(/images/banner/bg.jpg);
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                position: relative;
                margin: 0;
                font-family: Comfortaa;
            }

            body:before{
                position: absolute;
                content: '';
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to right, rgba(9, 179, 239, 0.8) 0%, rgba(30, 80, 226, 0.8) 100%);
            }

            img{
                height: 190px;
                margin-bottom: -50px;
            }

            h3{
                font-size: 40px;
                font-weight: 700;
                margin: 0;
                margin-bottom: 20px;
            }

            p{
                margin: 0;
                font-size: 20px;
            }

            .error{
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }

            .container{
                display: flex;
                justify-content: center;
            }

            .card{
                background: #fff;
                text-align: center;
                display: flex;
                flex-flow: column;
                align-items: center;
                justify-content: center;
                padding: 30px;
                box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.15);
                border-radius: 20px;
                position: relative;
            }

            @media (max-width: 500px) {
                .card{
                    margin: 15px;
                }
            }
        </style>
    </head>
    <body>
    <div class="error">
        <div class="container">
            <div class="card">
                <img src="/images/preloader-loop.gif" alt="PayDay">
                <h3>404</h3>
                <a href="/">На главную</a>
            </div>
        </div>
    </div>
    </body>
    </html>

    </body>
</html>
