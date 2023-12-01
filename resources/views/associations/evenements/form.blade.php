@extends('associations.base')

@section('title', 'Associations') 

@section('nom_association', Auth::guard('associations')->user()->nom) 

@section('content')
   

<div class=" col-md-12 mt-5 mr-3" style="background-color: #6d7fcc; color:aliceblue; padding: 20px; margin-left:70%; border-radius: 10px;" >
    @include('shared.succesOrErrorMsg')
    <form class="vstack gap-2" action="{{ route( $evenement ->exists ? 'association.evenement.update' : 'association.evenement.store', ['evenement' =>  $evenement ] ) }}" method="post"  enctype="multipart/form-data"  >
        @csrf   
        @method($evenement->exists ? 'put' : 'post')
   
        <legend class="text-center"> {{ $evenement->exists  ? 'Editer cet évenement' : 'Ajouter un evenement' }} </legend>
        @include('shared.input', ['type' => 'file', 'label' => 'Image de couverture', 'name' => 'image_mise_en_avant' ])
        @include('shared.input', ['label' => 'Titre de l\'evenement ', 'name' => 'libelle', 'value' => $evenement->libelle ])
        @include('shared.input', ['type' => 'date', 'label' => 'Date de l\'evenement ', 'name' => 'date_evenement', 'value' => $evenement->date_evenement ])
        @include('shared.input', ['type' => 'date', 'label' => 'Date de l\'imite d\'inscription ', 'name' => 'date_limite_inscription', 'value' => $evenement->date_limite_inscription,])
        @include('shared.checkbox', [ 'label' => 'Cet évenement est-il cloturé ?', 'name' => 'est_cloturer_ou_pas', 'value' => $evenement->est_cloturer_ou_pas ])
        @include('shared.input', ['type' => 'hidden', 'label' => '', 'name' => 'association_id', 'value' => Auth::guard('associations')->user()->id ])
        @include('shared.submitBtn', ['class' => 'col-lg-6 text-center bg-dark', 'value' =>  $evenement->exists ? 'Editer' : 'Ajouter' ])
    </form>
</div>
@endsection