<!-- resources/views/calls/index.blade.php -->
@extends('layouts.app')

@section('content')
    <form action="{{route('call.store')}}" method="POST" class="container-fluid d-flex flex-column align-items-center col-6">
        @csrf
        <select class="form-control mb-4" name="call_from">
            <option value="" selected>Выберите пользователя</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('call_from')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Выбор пользователя, который получил звонок -->
        <select class="form-control mb-4" name="call_to">
            <option value="" selected>Выберите пользователя</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>


        <select class="form-control mb-4" name ="from_operator">
            <option value="" selected>Оператор звонившего</option>
            @foreach ($operators as $operator)
                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
            @endforeach
        </select>
        @error('from_operator')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select class="form-control mb-4" name ="to_operator" >
            <option value="" selected>Оператор получившего</option>
            @foreach ($operators as $operator)
                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
            @endforeach
        </select>
        @error('to_operator')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-control mb-4 border-0">
            <input type="number" name="duration" placeholder="Длительность звонка">
        </div>
        @error('duration')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary mt-4" type="submit">
          Добавить звонок
        </button>

    </form>
@endsection


