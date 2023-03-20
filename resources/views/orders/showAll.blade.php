@extends("layouts.main")
@section("order")
    @foreach($orders as $order)
        <div><a href="{{route('order.show',$order->id)}}">{{$order->id}}</a></div>
    @endforeach
@endsection
