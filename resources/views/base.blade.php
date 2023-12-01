<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- local link --}}
    <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LiveGo'Evens</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/home">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('association.evenement.create')}}">Compte association</a>
                    </li>
                </ul>
                    @if( auth('clients')->check() )  
                        @include('shared.formBtn', ['method' => 'post', 'another_method' => 'delete', 'action' => 'logoutClient' , 'value' =>'Se déconnecter', 'token' => true] )
                    @elseif (auth('associations')->check())   
                        @include('shared.formBtn', ['method' => 'post', 'another_method' => 'delete', 'action' => 'logoutClient' , 'value' =>'Se déconnecter', 'token' => true] )     
                    @else
                        @include('shared.formBtn', ['method' => 'get', 'action' => 'clientLoginForm' , 'value' =>'Se connecter', 'token' => false] )
                    @endif
            </div>
        </div>
    </nav>

    {{-- Banner --}}
    <img src="..." class="img-fluid" alt="...">

    <div class="container-fluid">
        @yield('content')
    </div>

</body>

</html>
