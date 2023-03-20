@extends("layouts.main")

@section("orderProduct")
    @foreach($order_products as $order_product)
        <div>Номер заказа:{{$order_product->order_id}}</div>
        <div>Id продукта:{{$order_product->product_id}}</div>
        <div>Количество{{$order_product->quantity}}</div>
        <p> </p>
    @endforeach

@endsection
