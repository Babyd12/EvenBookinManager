@extends('base')

@section('title', 'Client')

@section('nom_association', ' ')

@section('content')

<body>
    @if( auth('clients')->guest() || auth('association')->guest() )
    <div class=" col-md-4 mx-auto mt-5" style="background-color: #c4c7cb; padding: 20px; border-radius: 10px;" >
        @include('shared.succesOrErrorMsg')
        <form class="form-horizontal" action="{{route('authClient')}}" method="post" >
            @csrf
            <legend class="text-center">Connexion Client</legend>
            @include('shared.input', ['label' => 'Saisissez votre Email', 'name' => 'email'])
            @include('shared.input', ['type' => 'password', 'label' => 'Saissisez-votre mot de passe', 'name' => 'mot_de_passe'])
            @include('shared.submitBtn', ['class' => 'col-lg-3 text-center', 'value' => 'Connexion'])
        </form>
        @include('shared.formBtn', ['class' => 'col-lg-3 text-center mt-3','method' => 'get', 'action' => 'register.form', 'value' => 'S\'inscrire', 'token' =>false])
            
        
    </div>
   @endif

</body>

@stop
