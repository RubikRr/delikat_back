@extends("layouts.main")

@section("order")

        <div>Номер заказа:{{$order->id}}</div>
        <div >Имя: {{$order->first_name}} </div>
        <div >Фамилия: {{$order->last_name}} </div>
        <div >Номер телефона: {{$order->phone_number}} </div>
        <div >Улица: {{$order->street}} </div>
        <div >Дом: {{$order->house}} </div>
        <div >Корпус: {{$order->housing}} </div>
        <div>Подъезд: {{$order->entrance}} </div>
        <div>Квартира: {{$order->apartment}} </div>


        <div >
            <form action="{{route("order.edit",$order->id)}}" method="get">
                @csrf
                <div>
                    <input type="submit"  value="Изменить">
                </div>

            </form>
        </div>

        <div >
            <form action="{{route("order.delete",$order->id)}}" method="post">
                @csrf
                @method("delete")
                <div >
                    <input type="submit"  value="Удалить">
                </div>

            </form>
        </div>
        <p> </p>

@endsection
