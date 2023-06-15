<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            nav{
                width: 100%;
                height: 100px;
                background-color: #333;
            }
            nav ul{
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            nav ul li{
                list-style: none;
                margin: 0 10px;
                padding: 0 10px;
            }
            nav ul li a{
                text-decoration: none;
                color: #fff;
                font-size: 18px;
                font-weight: 500;
            }
            nav ul li a:hover{
                color: #f00;
            }
            </style>
    </head>
    <body>
        <div>
            @include('nav')

            <div>
                <h2>This is the Home Page</h2>
            </div>
        </div>
    </body>
</html>
