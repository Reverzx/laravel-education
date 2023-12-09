@extends("layouts.main_message")
@section("main_message")
<div>
    <form action="{{ route('message.update', $message->id) }}" method="POST">
        @csrf
        @method("patch")
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Заголовок</span>
            <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Заголовок" value="{{ $message->title }}">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="Content">Текст</span>
            <textarea name="content" class="form-control" aria-label="Sizing example input" aria-describedby="Content" placeholder="Текст"> {{ $message->content }} </textarea>
        </div>
        <select class="form-select" aria-label="Default select example" name="category_id">
            <option selected>Выбрать категорию</option>

            @foreach ($categories as $category)
            <option
            {{ $category->id == $message->category->id ? 'selected' : "" }}
            value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach

        </select>

        <div class="form-check">
            <select multiple class="form-select" aria-label="Пример выбора по умолчанию" id="tag" name="tags[]">
                @foreach ($tags as $tag)
                <option
                    @foreach ($message->tags as $mesTag)
                    {{ $tag->id == $mesTag->id ? 'selected' : "" }}
                    @endforeach
                value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
