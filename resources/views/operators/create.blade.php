@extends('layouts.app')

@section('content')
    <form action="{{route('operator.store')}}" method="POST" class="container d-flex flex-column align-items-center">
        @csrf
       <div class="form-group mb-2">
              <label for="name">Название оператора</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Название оператора">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
       </div>
         <div class="form-group mb-2">
                  <label for="prefix">Код оператора</label>
                  <input type="text" name="prefix" class="form-control" id="prefix" placeholder="Код оператора">
                 @error('prefix')
                 <div class="alert alert-danger">{{ $message }}
                 </div>
                 @enderror
             </div>

        <button class="btn btn-primary mt-4" type="submit">
          Добавить оператора
        </button>

    </form>
@endsection


