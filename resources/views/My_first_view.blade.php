@extends("layouts.main")
@section("main")
<div>
    @foreach ($Testing as $item)
        <div>{{$item->title}}</div>
        <div>{{$item->count_like}}</div>
    @endforeach
</div>
@endsection()
