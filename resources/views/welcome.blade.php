<h1>{{$heading}}</h1>

@if(count($items) == 0)
    <h3>Nemaaaa</h3>
@endif


@foreach ($items as $item)
<div>
    <p>{{$item['id']}}</p>
    <p>{{$item['name']}}</p>
</div>
@endforeach
