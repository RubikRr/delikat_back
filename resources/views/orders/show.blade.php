@extends("layouts.main")
@section("order")
    <div>Заказ номер {{$order->id}}</div>
    <div>Клиент {{$order->customer_id}}</div>
@endsection
