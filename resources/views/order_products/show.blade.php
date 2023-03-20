@extends("layouts.main")

@section("orderProduct")
    @foreach($orderProducts as $orderProduct)
        <div>Номер заказа:{{$orderProduct->order_id}}</div>
        <div>Id продукта:{{$orderProduct->product_id}}</div>
        <div>Количество{{$orderProduct->quantity}}</div>
        <p> </p>
    @endforeach

@endsection
