@extends("layouts.main")
@section("order")
    @foreach($orders as $order)
        <div><a href="{{route('order.show',$order->id)}}">Заказ номер:{{$order->id}}---{{$order->last_name}}</a></div>
    @endforeach
@endsection
