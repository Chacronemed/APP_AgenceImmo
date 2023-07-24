@extends('base')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>
                Afe
            </h1>
            <p>
                text text
            </p>
        </div>
    </div>

    <div class="container">
        <h2>Nos dernière biens</h2>

        <div class="row">
            @foreach($properties as $property)
            <div class="col">
                @include('PropertyShow.card')
            </div>
            @endforeach
        </div>
    </div>

@endsection
