@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Замовлення</h1>
    <a href="{{ url('/home') }}" class="btn btn-primary position-absolute" style="top: 80px; right: 315px;">До хати</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tour Name</th>  
                <th>Created At</th>
                <th>Status</th>
                <th>Дії</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->tour->name }}</td>  
                    <td>{{ $order->created_at }}</td>
                    <td>{{$order->status}}</td>
                    <td>
    <form action="{{ route('orders.destroy', $order->id) }}" method="post" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-original-title="Видалити замовлення">
            Видалити
        </button>
    </form>

    @if($order->trashed())
        <form action="{{ route('orders.restore', $order->id) }}" method="post" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" data-original-title="Відновити замовлення">
                Відновити
            </button>
        </form>
    @endif
</td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
    <a href="{{ route('orders.trashed') }}" class="btn btn-danger">Показати видалені</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection