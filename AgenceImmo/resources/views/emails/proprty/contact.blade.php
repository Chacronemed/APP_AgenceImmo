<x-mail::message>
# Nouvelle demande de Contatc

Une nouvelle demande de contact a été fait pour le bien <a href="{{route('Property.show',['slug'=>$property->getSlug(),'property'=>$property])}}">{{$property->title}}</a>.

    -Prénom: {{$data['firstname']}}
    -Nom: {{$data['lastname']}}
    -Télephone: {{$data['phone']}}
    -Email: {{$data['email']}}

***Message***<br>
     {{$data['message']}}

</x-mail::message>
