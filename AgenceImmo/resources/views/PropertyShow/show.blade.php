@extends('base')
@section('title', $property->title)

@section('content')

    <h1>{{$property->title}}</h1>
    <h2>{{$property->rooms}} pièces - {{$property->surface}}m²</h2>

    <div class="text-primary fw-bold" style="font-size: 4rem;">
        {{ number_format($property->prix, 0, ',', ' ') }} MAD
    </div>
    <hr>
    <div class="mt-4">
        <h4>intéressé par ce bien?</h4>

        @include('shared.flash')

        <form action="{{route('property.contact',$property)}}" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input',['class'=>'col','label'=>'Prénom','name'=>'firstname'])
                @include('shared.input',['class'=>'col','label'=>'Nom','name'=>'lastname'])
            </div>

            <div class="row">
                @include('shared.input',['class'=>'col','label'=>'Téléphone','name'=>'phone'])
                @include('shared.input',['type'=>'email','class'=>'col','label'=>'Email','name'=>'email'])
            </div>
            @include('shared.input',['type'=>'textarea','class'=>'col','label'=>'Votre Message','name'=>'message'])
            <button class="btn btn-primary">Nous Contacter</button>
        </form>
    </div>

    <div class="mt-4">
        <p>{!! nl2br($property->description) !!}</p>
        <div class="row">
            <div class="col-8">
                <h2>Caractéristiques</h2>
                <table class="table table-striped">
                    <tr>
                        <td>Surface habitable</td>
                        <td>{{$property->surface}}m²</td>
                    </tr>
                    <tr>
                        <td>Nombre de pièces</td>
                        <td>{{$property->rooms}}</td>
                    </tr>
                    <tr>
                        <td>Chambre</td>
                        <td>{{$property->bedrooms}}</td>
                    </tr>
                    <tr>
                        <td>étage</td>
                        <td>{{$property->floor ?: 'Rez de chaussé'}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h2>Spécificités</h2>
                <ul class="list-group">
                    @foreach($property->option()->pluck('name') as $option)
                        <li class="list-group-item">{{$option}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
