@extends("layouts.main_message")
@section("main_message")
<div>
    <div>
        <a href="{{ route("message.create") }}" class="btn btn-outline-success mb-3">Создать</a></button>
    </div>

    @foreach ($message as $value)
<div><a href="{{ route ('message.show', $value->id) }}">{{ $value->id }}. {{ $value->title }}. {{ $value->content }}</div>
    @endforeach

</div>
@endsection
