@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати місто</h1>
    <form action="{{ route('citys.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="cityName">Назва міста:</label>
            <input type="text" class="form-control" id="cityName" name="name" value="{{ $city->name }}" required>
        </div>
        <div class="form-group">
            <label for="countryId">Країна:</label>
            <select class="form-control" id="countryId" name="id_country" required>
                @foreach ($countrys as $country)
                    <option value="{{ $country->id }}" {{ $country->id == $city->id_country ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </form>
</div>
@endsection