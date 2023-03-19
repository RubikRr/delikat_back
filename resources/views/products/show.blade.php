@extends("layouts.main")
@section("product")
    <div >{{$product->name}} </div>
    <p><img src="{{ Storage::url('images/products/original/'.$product->image) }}" alt="{{$product->image}}"></p>
    <div >{{$product->price}} </div>
    <div ><textarea>{{$product->description}}</textarea> </div>
    <div>
        <div >
            <form action="{{route("product.edit",$product->id)}}" method="get">
                <div >
                    <input type="submit"  value="Изменить">
                </div>

            </form>
        </div>
        <div >
            <form action="{{route("product.delete",$product->id)}}" method="post">
                @csrf
                @method("delete")
                <div>
                    <input type="submit"  value="Удалить">
                </div>

            </form>
        </div>
    </div>

@endsection
