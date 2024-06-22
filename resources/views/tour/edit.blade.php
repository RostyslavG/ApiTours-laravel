@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати тур</h1>
    <form action="{{ route('tours.update', $tours->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tourName">Назва туру:</label>
            <input type="text" class="form-control" id="tourName" name="name" value="{{ $tours->name }}" required>
        </div>
        <div class="form-group">
            <label for="tourDescription">Опис туру:</label>
            <textarea class="form-control" id="tourDescription" name="description" required>{{ $tours->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="tourPrice">Ціна:</label>
            <input type="number" class="form-control" id="tourPrice" name="price" value="{{ $tours->price }}" required>
        </div>
        <div class="form-group">
            <label for="tourImage">Зображення:</label>
            <input type="text" class="form-control" id="tourImage" name="image" value="{{ $tours->image }}" required>
        </div>
        <div class="form-group">
            <label for="hotelId">Готель:</label>
            <select class="form-control" id="hotelId" name="id_hotel" required>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}" {{ $hotel->id == $tours->id_hotel ? 'selected' : '' }}>{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Зберегти зміни</button>
    </form>
</div>
@endsection