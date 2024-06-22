@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Додати новий тур</h1>
    <a href="{{ url('/home') }}" class="btn btn-primary position-absolute" style="top: 80px; right: 315px;">До хати</a>
    <form action="/api/tours" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="tourName">Назва туру:</label>
            <input type="text" class="form-control" id="tourName" name="name" required>
        </div>
        <div class="form-group">
            <label for="tourDescription">Опис туру:</label>
            <textarea class="form-control" id="tourDescription" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="tourPrice">Ціна:</label>
            <input type="number" class="form-control" id="tourPrice" name="price" required>
        </div>
        <div class="form-group">
            <label for="tourImage">Зображення:</label>
            <input type="file" class="form-control" id="tourImage" name="image" required>
        </div>
        <div class="form-group">
            <label for="hotelId">Готель:</label>
            <select class="form-control" id="hotelId" name="id_hotel" required>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

    <h1>Список турів</h1>
    <ul class="list-group">
        @foreach ($tours as $tour)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h5>{{ $tour->name }}</h5>
                <p>{{ $tour->description }}</p>
                <p>Ціна: {{ $tour->price }} грн</p>
                <img src="{{ asset('storage/' . $tour->image) }}" alt="Зображення" style="width: 100px;">
               
            </div>

            <div>
                <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-original-title="Редагувати">
                    Редагувати
                </a>

                <form action="{{ route('tours.destroy', $tour->id) }}" method="post" style="display: inline;">
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