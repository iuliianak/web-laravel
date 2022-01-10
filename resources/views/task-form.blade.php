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
            <center> <h5 class="card-title">Добавить новое задание</h5></center>
            <br>
            <form method="post" action="{{ route('tasks.store') }}">
                @csrf()
                <div class="mb-3">
                    <label class="form-label">Название задания:</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" >
                                    </div>
                <div class="mb-3">
                    <label class="form-label">Текст задания:</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" >
                        </textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">User</label>
                        <select name="user_id" aria-label="Default select example" class="form-select @error('user_id') is-invalid @enderror">
                        <option disabled selected>Выберите юзера:</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
   </center>
@endsection
