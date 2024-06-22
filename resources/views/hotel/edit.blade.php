@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати готель</h1>
    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="hotelName">Назва готелю:</label>
            <input type="text" class="form-control" id="hotelName" name="name" value="{{ $hotel->name }}" required>
        </div>
        <div class="form-group">
            <label for="cityId">Місто:</label>
            <select class="form-control" id="cityId" name="id_city" required>
                @foreach ($citys as $city)
                    <option value="{{ $city->id }}" {{ $city->id == $hotel->id_city ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="countryId">Країна:</label>
            <select class="form-control" id="countryId" name="id_country" required>
                @foreach ($countrys as $country)
                    <option value="{{ $country->id }}" {{ $country->id == $hotel->id_country ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </form>
</div>
@endsection