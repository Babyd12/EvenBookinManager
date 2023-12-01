@extends('base')

@section('title', 'Evenement | Participant') 

@section('nom_association', Auth::guard('associations')->user() ?  Auth::guard('associations')->user()->nom :  Auth::guard('clients')->user()->nom) 

@section('content')

<div class=" col-md-4 mt-5 mr-3" style=" padding: 20px; margin-left:30%; border-radius: 10px;" >
    @include('shared.succesOrErrorMsg')
    <form class="vstack gap-2" action="/reservation" method="post"  enctype="multipart/form-data"  >
        @csrf   
        @method('post')
   
        <legend class="text-center"> {{'Est-vous accompagé ? ' }} </legend>
 
        @include('shared.input', ['label' => 'Entrer le nombre d\'accompagneurs vous y compris ', 'name' => 'est_accompager_par'])
        @include('shared.input', ['type' => 'hidden', 'label' => '', 'name' => 'evenement_id', 'value' => $evenement_id])
        @include('shared.input', ['type' => 'hidden', 'label' => '', 'name' => 'client_id', 'value' =>  Auth::guard('associations')->user() ?  Auth::guard('associations')->user()->id :  Auth::guard('clients')->user()->id  ])

        @include('shared.submitBtn', ['class' => 'col-lg-6 text-center bg-dark col-white', 'value' => 'Valider ma réservation' ])
    </form>
</div>
@endsection