<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <div>
            @include('dashnav')

            <div>
                <h2>This is the dashboard</h2>
            </div>
        </div>
    </body>
</html>
