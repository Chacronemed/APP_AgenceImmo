<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('title')| Administration</title>
    <style>
        @layer reset {
            button{
                all:unset;
            }
        }
    </style>
</head>
<body>

<!-- As a link -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @php
                $route=request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('admin.property.index')}}" @class(['nav-link','active'=>str_contains($route,'property.')])>Gérer les biens</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.option.index')}}" @class(['nav-link','active'=>str_contains($route,'option.')])>Gérer les options</a>
                    </li>
                </ul>
                 <div class="navbar-nav ml-auto">
                     @auth
                         <ul class="navbar-nav">
                             <li class="nav-item">
                                 <form action="{{route('logout')}}" method="post">
                                     @csrf
                                     @method('delete')
                                     <button class="nav-link">Se déconnecter</button>
                                 </form>
                             </li>
                         </ul>
                     @endauth
                 </div>
            </div>
        </div>
    </nav>

<div class="container mt-5">

    @include('shared.flash')

    @yield('content')
</div>
<script>
    new TomSelect('select[multiple]',{plugins:{remove_button: {'title': 'Supprimer'}}})
</script>
</body>
</html>
