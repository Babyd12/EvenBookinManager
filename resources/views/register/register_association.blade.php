@extends('base')

@section('title', 'Client')

@section('nom_association', ' ')

@section('content')

    <body>

        <div class=" col-md-4 mx-auto mt-5 " style="color:#fff padding: 20px; border-radius: 10px;">
            <form class="form-horizontal " action="{{ route('register.association') }}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('post')
                <legend class="text-center">Inscription Entreprise </legend>
                @include('shared.input', [ 'type' => 'file',  'label' => 'Inserer votre logo', 'name' => 'logo'])
                @include('shared.input', ['label' => 'Saisiesez le nom de votre association', 'name' => 'nom'])
                @include('shared.input', ['label' => 'Saisissez votre slogan', 'name' => 'slogan'])
                @include('shared.input', ['type' => 'email', 'label' => 'Email', 'name' => 'email'])
                @include('shared.input', ['type' => 'phone', 'label' => 'Saisiez le numero de telephone de l\'association ', 'name' => 'telephone'])
                @include('shared.input', ['type' => 'password', 'label' => 'Saisissez votre mot de passe', 'name' => 'mot_de_passe'])
                
                @include('shared.submitBtn', ['class' => 'col-lg-3 text-center', 'value' => 'Inscription'])
                
            </form>
        </div>
    </body>
@stop

</html>
