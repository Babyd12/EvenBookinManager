<div class="card">
    @if ($evenement->image)
    <img src="{{ $evenement->imageUrl() }}" class="card-img-top" alt="">
    @endif
    <div class="card-body">
        <h2 class="card-title">{{ $evenement->libelle }}</h2>
        <p class="card-text">{{ $evenement->date_limite_inscription  }}</p>

        <p class="card-text">
            <i class="bi-geo-alt-fill">{{ $evenement->est_cloturer_ou_pas ? 'Cloturé' : 'Disponible'   }} </i>
        </p>

        {{-- <a href="{{ route('evenement.show', ['slug' => $evenement->getSlug(), 'evenement' => $evenement]) }}" class="btn btn-primary">Intéréssé ?</a> --}}

        <div class="text-primary fw-bold " style="font-size:1.4em;">
            Publié par : {{ $evenement->association->nom }}
        </div>
        <i class="bi-chat-square"></i>

        <a href="/comment/{{ $evenement -> id }}">Participer</a>
    </div>
</div>
