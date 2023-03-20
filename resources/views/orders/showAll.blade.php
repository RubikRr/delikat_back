@extends("layouts.main")
@section("order")
    @foreach($orders as $order)
        <div><a href="{{route('order.show',$order->id)}}">Заказ номер:{{$order->id}}</a></div>
    @endforeach
@endsection
