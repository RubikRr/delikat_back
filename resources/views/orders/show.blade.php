@php use App\Http\Controllers\OrderProductController; @endphp
@extends("layouts.main")


@section("order")

    <div>Номер заказа:{{$order->id}}</div>
    <div>Имя: {{$order->first_name}} </div>
    <div>Фамилия: {{$order->last_name}} </div>
    <div>Номер телефона: {{$order->phone_number}} </div>
    <div>Почта: {{$order->email}} </div>
    <div>Улица: {{$order->street}} </div>
    <div>Дом: {{$order->house}} </div>
    <div>Корпус: {{$order->housing}} </div>
    <div>Подъезд: {{$order->entrance}} </div>
    <div>Квартира: {{$order->apartment}} </div>
    <p></p>

    @foreach($orderProducts as $orderProduct)
        <div>Название продукта:{{(new OrderProductController)->getName($orderProduct->product_id)}}</div>
        <div>Количество{{$orderProduct->quantity}}</div>
        <p></p>
    @endforeach

    <div>
        <form action="{{route("order.edit",$order->id)}}" method="get">
            @csrf
            <div>
                <input type="submit" value="Изменить">
            </div>

        </form>
    </div>

    <div>
        <form action="{{route("order.delete",$order->id)}}" method="post">
            @csrf
            @method("delete")
            <div>
                <input type="submit" value="Удалить">
            </div>

        </form>
    </div>

@endsection
