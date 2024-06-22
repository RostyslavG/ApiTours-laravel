@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Видалені замовлення</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tour Name</th>  
                        <th>Deleted At</th>
                        <th>Status</th>
                        <th>Дії</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->tour->name }}</td>  
                        <td>{{ $order->deleted_at }}</td>
                        <td>{{$order->status}}</td>
                        <td>
                            <form action="{{ route('orders.restore', $order->id) }}" method="post" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" data-original-title="Відновити замовлення">
                                    Відновити
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('orders.index') }}" class="btn btn-primary">Повернутися до списку замовлень</a>
        </div>
    </div>
</div>
@endsection