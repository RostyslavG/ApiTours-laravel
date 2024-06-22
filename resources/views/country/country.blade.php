@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Додати нову країну</h1>
    <a href="{{ url('/home') }}" class="btn btn-primary position-absolute" style="top: 80px; right: 315px;">До хати</a>
    <form action="/api/countrys" method="POST">
        @csrf 
        <div class="form-group">
            <label for="countryName">Назва країни:</label>
            <input type="text" class="form-control" id="countryName" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

    <h1>Список країн</h1>
    <ul class="list-group">
        @foreach ($countrys as $country)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $country->name }} 

            <div>
                <a href="{{ route('countrys.edit', $country->id) }}" class="btn btn-sm btn-secondary mr-2" data-toggle="tooltip" data-original-title="Редагувати">
                    Редагувати
                </a>

                <form action="{{ route('countrys.destroy', $country->id) }}" method="post" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-original-title="Видалити">
                        Видалити
                    </button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection


