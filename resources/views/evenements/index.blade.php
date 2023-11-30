@extends('base')

@section('title', 'Tous les events')
@section('content')

    <div class="d-flex justify-content-between algin-items-center">
        <h1>@yield('title')</h1>
        {{-- <a href="{{route('admin.event.create')}}" class="btn btn-primary"> Ajouter</a> --}}
    </div>
   
        @foreach ($evenements as $evenement)
            @include('evenements.card')
        @endforeach

    {{ $evenements->links() }}
@stop
