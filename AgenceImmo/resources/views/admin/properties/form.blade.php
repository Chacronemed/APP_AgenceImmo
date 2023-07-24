@extends('admin.admin')

@section('title',$property->exists? "Modifier le bien":"Ajout d'un bien")

@section('content')

    <h1>@yield('title')</h1>
    <form action="{{route($property->exists? 'admin.property.update': 'admin.property.store',['property'=>$property])}}" method="post">
        @csrf
        @method($property->exists ? "put" : "post")
        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Titre','name'=>'title','value'=>$property->title])
            <div class="col row">
                @include('shared.input',['class'=>'col','name'=>'surface','value'=>$property->surface])
                @include('shared.input',['class'=>'col','name'=>'prix','value'=>$property->prix])

            </div>
        </div>
            @include('shared.input',['type'=>'textarea','class'=>'col','name'=>'description','value'=>$property->description])

        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Pieces','name'=>'rooms','value'=>$property->rooms])
            @include('shared.input',['class'=>'col','label'=>'Chambres','name'=>'bedrooms','value'=>$property->bedrooms])
            @include('shared.input',['class'=>'col','label'=>'étage','name'=>'floor','value'=>$property->floor])
        </div>
        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Adresse','name'=>'adresse','value'=>$property->adresse])
            @include('shared.input',['class'=>'col','label'=>'ville','name'=>'ville','value'=>$property->ville])
            @include('shared.input',['class'=>'col','label'=>'Code Postal','name'=>'code_postale','value'=>$property->code_postale])
        </div>
            @include('shared.select',['class'=>'col','label'=>'Options','name'=>'options','options'=>$options,'value'=>$property->option()->pluck('id'),'multiple'=>true])
            @include('shared.checkbox',['class'=>'col','label'=>'Vendu','name'=>'etat','value'=>$property->etat])

        <div>
            <button class="btn btn-primary">
                @if($property->exists) Modifier
                @else Ajouter
                @endif
            </button>
        </div>
    </form>

@endsection
