@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Додати новий готель</h1>
    <a href="{{ url('/home') }}" class="btn btn-primary position-absolute" style="top: 80px; right: 315px;">До хати</a>
    <form action="/api/hotels" method="POST">
        @csrf
        <div class="form-group">
            <label for="hotelName">Назва готелю:</label>
            <input type="text" class="form-control" id="hotelName" name="name" required>
        </div>
        <div class="form-group">
            <label for="cityId">Місто:</label>
            <select class="form-control" id="cityId" name="id_city" required>
                @foreach ($citys as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
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

    <h1>Список готелів</h1>
    <ul class="list-group">
        @foreach ($hotels as $hotel)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $hotel->name }} 

            <div>
                <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-sm btn-secondary mr-2" data-toggle="tooltip" data-original-title="Редагувати">
                    Редагувати
                </a>

                <form action="{{ route('hotels.destroy', $hotel->id) }}" method="post" style="display: inline;">
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