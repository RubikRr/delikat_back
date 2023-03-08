@extends("layouts.main")
@section("product")
    <div class="row">{{$product->name}} </div>
    <div class="row">{{$product->img}} </div>
    <div class="row">{{$product->price}} </div>
    <div ><textarea>{{$product->description}}</textarea> </div>
    <div>
        <div >
            <form action="{{route("product.edit",$product->id)}}" method="get">
                <div class="btn">
                    <input type="submit"  value="Изменить">
                </div>

            </form>
        </div>
        <div >
            <form action="{{route("product.delete",$product->id)}}" method="post">
                @csrf
                @method("delete")
                <div class="btn ">
                    <input type="submit"  value="Удалить">
                </div>

            </form>
        </div>
    </div>

@endsection
