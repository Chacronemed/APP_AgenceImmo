@extends('base')
@section('title', 'Tous nos biens')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Surface Min" class="form-control" name="surface" value="{{ request('surface') }}">
            <input type="number" placeholder="nombre de piece min" class="form-control" name="rooms" value="{{ request('rooms') }}">
            <input type="number" placeholder="Budget Max" class="form-control" name="prix" value="{{ request('prix') }}">
            <input type="text" placeholder="mot clé" class="form-control" name="title" value="{{ request('title') }}">
            <button class="btn btn-primary btn-sm flex-grow-0"> Rechercher</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse($properties as $property)
                <div class="col-3 mb-4">
                    @include('PropertyShow.card')
                </div>
            @empty
                <div class="col-3 mb-4">
                    Aucun Bien trouvé
                </div>
            @endforelse
        </div>
    </div>

    <div class="container my-4">
        {{$properties->links()}}
    </div>

@endsection
