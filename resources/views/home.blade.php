<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        html {
            overflow: scroll;
            overflow-x: hidden;
        }
        ::-webkit-scrollbar {
            width: 0;  /* Remove scrollbar space */
            background: transparent;  /* Optional: just make scrollbar invisible */
        }
        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
    </style>
</head>
    <body style="background-color: #f3f3f3; margin: 0; padding: 0; display: flex;
     flex-direction: column; min-height: 100vh; overflow-x: hidden;">

        @include('nav')
        @include('hero')

        <h2 style="margin-top: 5rem; text-align:center">
            Products
        </h2>

        @include('products')

        <h2 style="margin-top: 3rem; text-align:center">
            Services
        </h2>

        @include('services')
        @include('footer')
    </body>
</html>
