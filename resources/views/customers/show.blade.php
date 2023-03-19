@extends("layouts.main")
@section("customer")
    <div >{{$customer->first_name}} </div>
    <div >{{$customer->last_name}} </div>
    <div >{{$customer->phone_number}} </div>
    <div >{{$customer->street}} </div>
    <div >{{$customer->house}} </div>
    <div >{{$customer->housing}} </div>
    <div>{{$customer->entrance}} </div>
    <div>{{$customer->apartment}} </div>
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
