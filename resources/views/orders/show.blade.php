@extends("customers.showFields")
@section("order")
    <div>Заказ номер {{$order->id}}</div>
    @yield("customerFields")


@endsection
