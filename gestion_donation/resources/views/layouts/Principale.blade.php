<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunu Don - @yield('title')</title>
    <link rel="stylesheet" href="../css/app.css">
   
    <style>
        /* Style pour la boîte d'alerte */
        .alert {
            padding: 10px;
            margin:20px auto;
            border: 1px solid transparent;
            border-radius: 4px;

        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>

</head>
<body>


    @include('layouts.header')
    <b>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div></b>
@endif
    <main>
        @yield('content')
    </main>

   
</body>
</html>
