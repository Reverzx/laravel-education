@extends('layouts.main_message')
@section('main_message')
    <div>
        <form action="{{ route('message.store') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Заголовок</span>
                <input value="{{ old('title') }}" type="text" name="title" class="form-control"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Заголовок">
            </div>
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror



            <div class="input-group mb-3">
                <span class="input-group-text" id="Content">Текст</span>
                <textarea value='{{ old('content') }}' name="content" class="form-control" aria-label="Sizing example input"
                    aria-describedby="Content" placeholder="Текст"></textarea>
            </div>
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror


            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <option selected>Выбрать категорию</option>
                    @foreach ($categories as $category)
                        <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror



            <div class="form-check">
                <select multiple class="form-select" aria-label="Пример выбора по умолчанию" id="tag" name="tags[]">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
