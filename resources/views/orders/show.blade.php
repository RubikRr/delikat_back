@extends("layouts.main")

@section("order")
    <div>Заказ номер {{$order->id}}</div>

    <div>Клиент <a  href="{{route("customer.show" , $order->customer_id)}}">{{$customer->last_name}}</a></div>
    <div>

    </div>

    @yield("customer")
@endsection
