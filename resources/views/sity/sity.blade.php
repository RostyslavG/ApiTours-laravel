@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Додати нове місто</h1>
    <a href="{{ url('/home') }}" class="btn btn-primary position-absolute" style="top: 80px; right: 315px;">До хати</a>
    <form action="/api/citys" method="POST">
        @csrf
        <div class="form-group">
            <label for="cityName">Назва міста:</label>
            <input type="text" class="form-control" id="cityName" name="name" required>
        </div>
        <div class="form-group">
            <label for="countryId">Країна:</label>
            <select class="form-control" id="countryId" name="id_country" required>
                @foreach ($countrys as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

    <h1>Список міст</h1>
    <ul class="list-group">
        @foreach ($citys as $city)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $city->name }} 

            <div>
                <a href="{{ route('citys.edit', $city->id) }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-original-title="Редагувати">
                    Редагувати
                </a>

                <form action="{{ route('citys.destroy', $city->id) }}" method="post" style="display: inline;">
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