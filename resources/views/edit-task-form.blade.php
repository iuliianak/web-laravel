@extends('layouts.main')

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach

    @endif


    <center> <div class="card" style="width: 50rem;">
            <div class="card-body"  style="text-align:left;">
                <center> <h5 class="card-title">Изменить задание</h5></center>
                <br>
                <form method="post" action="{{ route('tasks.update',['task'=>$task->id]) }}">
                    @csrf()
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Название задания:</label>
                        <input type="text" name="title" class="form-control @error('name') is-invalid @enderror" value="{{ $task->title }}">
                        <input type="hidden" name="task_id" value="{{ $task->id }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Текст задания:</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" >{{ $task->content }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Выберите юзера:</label>
                        <select name="user_id"  aria-label="Default select example" class="form-select @error('user_id') is-invalid @enderror">
                            <option disabled selected>Выберите юзера:</option>
                            @foreach($users as $user)
                                @if($user->id==$task->creator_id)
                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Выберите статус:</label>
                        <select name="status_id"  aria-label="Default select example" class="form-select @error('status_id') is-invalid @enderror">
                            <option disabled selected>Выберите статус:</option>
                            @foreach($statuses as $status)
                                @if($status->id==$task->status_id)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @else
                                    <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
        </div>
    </center>
@endsection
