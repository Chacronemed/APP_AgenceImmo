<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('Property.show',['slug'=>$property->getSlug(),'property'=>$property])}}">{{$property->title}}</a>
        </h5>
        <p class="card-text">{{$property->surface}}m² - {{$property->ville}} ({{$property->code_postale}})</p>
        <div class="text-primary" style="font-size: 1.4rem; font-weight:bold;">{{number_format($property->prix,thousands_separator: ' ')}}</div>
    </div>
</div>
