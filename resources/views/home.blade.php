@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Хата</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actions') }}</div>

                <div class="card-body d-flex flex-column align-items-center">
                    <a href="{{ url('countrys') }}" class="btn btn-primary mb-2">Добавити країну</a>
                    <a href="{{ url('citys') }}" class="btn btn-primary mb-2">Добавити місто</a>
                    <a href="{{ url('hotels') }}" class="btn btn-primary mb-2">Добавити готель</a>
                    <a href="{{ url('tours') }}" class="btn btn-primary mb-2">Добавити тур</a>
                    <a href="{{ url('docapi') }}" class="btn btn-secondary mb-2">Документація по API</a>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-2">Замовлення</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
