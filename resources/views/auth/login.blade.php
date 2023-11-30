<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    @guest('clients')
    <div class=" col-md-4 mx-auto mt-5" style="background-color: #c4c7cb; padding: 20px; border-radius: 10px;" >
        @include('shared.succesOrErrorMsg')
        <form class="form-horizontal" action="{{route('login')}}" method="post" >
            @csrf   
            @method('post')
            <legend class="text-center">Connexion</legend>
            @include('shared.input', ['label' => 'Saisissez votre Email', 'name' => 'email'])
            @include('shared.input', ['type' => 'password', 'label' => 'Saissisez-votre mot de passe', 'name' => 'mot_de_passe'])
            @include('shared.submitBtn', ['class' => 'col-lg-3 text-center', 'value' => 'Connexion'])
        </form>
        @include('shared.formBtn', ['class' => 'col-lg-3 text-center mt-3','method' => 'get', 'action' => 'register', 'value' => 'S\'inscrire', 'token' =>false])
            
        
    </div>
    @endguest('clients')

</body>

</html>
