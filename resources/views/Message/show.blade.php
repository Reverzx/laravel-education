@extends("layouts.main_message")
@section("main_message")
<div>
   <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Тема</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Фотография</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">{{ $message->id }}</th>
            <td>{{ $message->title }}</td>
            <td>{{ $message->content }}</td>
            <td>@mdo</td>
          </tr>
        </tbody>
    </table>
    <div>
        <a href="{{ route("message.index") }}" class="btn btn-outline-primary mb-3">Назад</a></button>
    </div>
    <div>
        <a href="{{ route("message.edit", compact ("message")) }}" class="btn btn-outline-primary mb-3">Редактировать</a></button>
    </div>
    <div>
        <form action="{{ route("message.delete", $message->id) }}" method="POST">
        @csrf
        @method("delete")
        <input type="submit" value="УДАЛИТЬ" class="btn btn-outline-danger mb-3">
        </form>
    </div>
</div>
@endsection
