@extends('admin.admin')

@section('title',$option->exists? "Modifier l'option":"Ajout d'une option")

@section('content')

    <h1>@yield('title')</h1>
    <form action="{{route($option->exists? 'admin.option.update': 'admin.option.store',['option'=>$option])}}" method="post">
        @csrf
        @method($option->exists ? "put" : "post")

        @include('shared.input',['label'=>'Nom','name'=>'name','value'=>$option->name])

        <div>
            <button class="btn btn-primary">
                @if($option->exists) Modifier
                @else Ajouter
                @endif
            </button>
        </div>
    </form>

@endsection
