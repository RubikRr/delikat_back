@extends("layouts.main")
@section("product")
    <div class="row">{{$product->name}} </div>
    <div class="row">{{$product->img}} </div>
    <div class="row">{{$product->price}} </div>
    <div ><textarea>{{$product->description}}</textarea> </div>
    <div style="display: flex" >
        <div style="margin-right: 10px"><button class="button button_edit"> <a href="{{route("product.edit",$product->id)}}">Изменить</a></button></div>

        <div><form action="{{route("product.delete",$product->id)}}" method="post">
            @csrf
            @method("delete")
            <input type="submit" class="button button_delete" value="Удалить">
        </form>
        </div>
    </div>

@endsection
