<!-- resources/views/calls/index.blade.php -->
@extends('layouts.app')
@vite(['resources/css/statistics.css'])

@section('content')
    <div class="container">
        <h1>Статистика пользователя: {{ $userName }}</h1>
    <statistics :user-id="{{ $userId }}"></statistics>
    </div>

@endsection


