<!-- resources/views/calls/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-column align-items-center col-10">
        <table class="table">
            <thead>
            <tr>
                <th>
                    Название оператора
                </th>
                <th>
                    Код оператора
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($operators as $operator)
            <tr>
                <td>
                    {{ $operator->name }}
                </td>
                <td>
                    {{ $operator->prefix }}
                </td>
                <td>
                    <form action="{{route('operator.destroy',$operator->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none">
                            <svg style="width:20px;height: 20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg>
                        </button>
                    </form>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>

        <div class="btn btn-primary mt-4">
            <a href="{{ route('operator.create') }}" class="text-white" style="text-decoration: none;">Добавить оператора</a>
        </div>
    </div>


@endsection


