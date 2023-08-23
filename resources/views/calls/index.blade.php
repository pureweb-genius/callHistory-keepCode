<!-- resources/views/calls/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-column align-items-center">
        <calls-list :calls="{{ $calls }}"></calls-list>

        <div class="btn btn-primary mt-4">
            <a href="{{ route('call.create') }}" class="text-white" style="text-decoration: none;">Добавить звонок</a>
        </div>
    </div>


@endsection


