@extends('layouts.app')

@section('content')
    <form action="{{route('tariff.update',$tariff->id)}}" method="POST" class="container d-flex flex-column align-items-center">
        @csrf
        @method('PUT')
        <input type="text" class="form-control mb-4" value="{{ $tariff->operatorFrom->name }}" readonly>
        <input type="text" class="form-control mb-4" value="{{ $tariff->operatorTo->name }}" readonly>

        <div class="form-control mb-4 border-0">
            <input type="number" name="cost" placeholder="Цена за минуту" value="{{$tariff->cost}}">
        </div>
        @error('cost')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary mt-4" type="submit">
          Изменить тариф
        </button>

    </form>
@endsection


