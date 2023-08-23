@extends('layouts.app')

@section('content')
    <form action="{{route('tariff.store')}}" method="POST" class="container d-flex flex-column align-items-center">
        @csrf
        <select class="form-control mb-4" name ="operator_id_from">
            <option value="" selected>Выберите первого оператора</option>
            @foreach ($operators as $operator)
                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
            @endforeach
        </select>
        @error('operator_id_from')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select class="form-control mb-4" name ="operator_id_to">
            <option value="" selected>Выберите второго оператора</option>
            @foreach ($operators as $operator)
                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
            @endforeach
        </select>
        @error('operator_id_to')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-control mb-4 border-0">
            <input type="number" name="cost" placeholder="Цена за минуту">
        </div>
        @error('cost')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary mt-4" type="submit">
          Добавить тариф
        </button>

    </form>
@endsection


