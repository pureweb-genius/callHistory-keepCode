@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Добро пожаловать') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Вы вошли в свой аккаунт') }}
                </div>
                <div class="container d-flex">
                    <div class="card-body">
                        <a href="{{ route('call.index') }}" class="btn btn-primary">Перейти к журналу</a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('operator.index') }}" class="btn btn-primary">Перейти к операторам</a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('tariff.index') }}" class="btn btn-primary">Перейти к тарифам</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('download.zip')}}" class="btn btn-primary">Скачать архив</a>
                    </div>
                </div>

</div>
            </div>
        </div>
    </div>
@endsection
