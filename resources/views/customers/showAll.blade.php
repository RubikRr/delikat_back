
@extends("layouts.main")
@section("customer")
    @foreach($customers as $customer)
        <div ><a  href="{{route("customer.show" , $customer->id)}}">{{$customer->last_name}}</a> </div>
    @endforeach
    <a href="{{route("customer.create")}}">Создать пользователя</a>
@endsection
