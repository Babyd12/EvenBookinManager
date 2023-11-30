@extends('associations.base')

@section('title', 'Liste des évenements') 

@section('nom_association', Auth::guard('clients')->user()->nom) 

@section('content')
<table class="table table-striped">

    <thead>
        <th>Image de couverture</th>
        <th>Titre de l'évenement</th>
        <th>Date</th>
        <th>Date limite d'inscription</th>
        <th class="text-end">Action</th>
    </thead>

    <tbody>
        @foreach($evenements as $evenement)
        <tr>
            <td>{{ $evenement ->imageUrl() }}</td>
            <td>{{ $evenement ->libelle }}</td>
            <td>{{ $evenement ->date_evenement }}</td>
            <td>{{ $evenement ->date_limite_inscription }}</td>
            <td>{{ $evenement ->est_cloturer_ou_pas ? 'Cloturé' : 'Disponible' }}</td>
           
            <td> @include('shared.formBtn', [ 'method' =>'get', 'token' => false,  'value' => 'Editer', 'action' => 'association.evenement.edit', 'argument' => $evenement ]) </td>
            <td> @include('shared.formBtn', [ 'another_method' => 'delete', 'class' => 'btn btn-danger', 'value' => 'Supprimer', 'action' => 'association.evenement.destroy', 'argument' => $evenement ]) </td>
        </tr>
        @endforeach
    </tbody>
   
   
   
</table>
{{ $evenements -> links() }}
@stop