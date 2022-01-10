@extends('layouts.main')

@section('content')

    <center> <div class="card" style="width: 50rem;">
            <div class="card-body"  style="text-align:left;">
                <center> <h5 class="card-title">Список всех заданий</h5></center>
                <br>
                <table class="table">
                    <thead>
                    <tr><th scope="col">User</th>
                        <th scope="col">Название задания</th>
                        <th scope="col">Дата создания</th></tr>
                    </thead>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td><a href="{{ route('tasks.edit',['task'=>$task->id]) }}">Редактировать</a></td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </center>
@endsection
