@extends("layouts.main")
@section("product")
    <div >{{$product->name}} </div>
    <div>{{$product->description}} </div>
    <div>{{$product->img}} </div>
    <div>   {{$product->price}} </div>
    <a href="{{route("product.edit",$product->id)}}">Изменить</a>
    <form action="{{route("product.delete",$product->id)}}" method="post">
        @csrf
        @method("delete")
        <input type="submit" value="Удалить">
    </form>
@endsection
