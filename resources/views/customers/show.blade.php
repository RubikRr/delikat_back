@extends("layouts.main")

@section("customer")
    <div >Имя: {{$customer->first_name}} </div>
    <div >Фамилия: {{$customer->last_name}} </div>
    <div >Номер телефона: {{$customer->phone_number}} </div>
    <div >Улица: {{$customer->street}} </div>
    <div >Дом: {{$customer->house}} </div>
    <div >Корпус: {{$customer->housing}} </div>
    <div>Подъезд: {{$customer->entrance}} </div>
    <div>Квартира: {{$customer->apartment}} </div>
    <div >
        <form action="{{route("customer.edit",$customer->id)}}" method="get">
            @csrf
            <div>
                <input type="submit"  value="Изменить">
            </div>

        </form>
    </div>

    <div >
        <form action="{{route("customer.delete",$customer->id)}}" method="post">
            @csrf
            @method("delete")
            <div >
                <input type="submit"  value="Удалить">
            </div>

        </form>
    </div>

@endsection
