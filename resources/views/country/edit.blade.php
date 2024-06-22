@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати країну</h1>
    <form action="{{ route('countrys.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="countryName">Назва країни:</label>
            <input type="text" class="form-control" id="countryName" name="name" value="{{ $country->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </form>
</div>
@endsection