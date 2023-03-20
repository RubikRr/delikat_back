@extends("layouts.main")
@section("customerFields")
    <div >Имя: {{$customer->first_name}} </div>
    <div >Фамилия: {{$customer->last_name}} </div>
    <div >Номер телефона: {{$customer->phone_number}} </div>
    <div >Улица: {{$customer->street}} </div>
    <div >Дом: {{$customer->house}} </div>
    <div >Корпус: {{$customer->housing}} </div>
    <div>Подъезд: {{$customer->entrance}} </div>
    <div>Квартира: {{$customer->apartment}} </div>
@endsection
