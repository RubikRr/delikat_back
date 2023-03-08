@extends("layouts.main")
@section("product")
    <div>
        <form action="{{route("product.update",$product->id)}}" method="post">
            @csrf
            @method("patch")
            <div >
                <div> <label for="name">Назваение</label></div>
                <div><input type="text" name="name" placeholder="Name"  autocomplete="off"  value="{{$product->name}}"></div>
            </div>
            <div class="product">
                <div><label for="img">Картинка</label></div>
                <div> <input type="text" name="img"   placeholder="Img" autocomplete="off" value="{{$product->img}}"></div>

            </div>
            <div class="product">
                <div><label for="price">Цена</label></div>
                <div><input type="number" name="price"  placeholder="Number"  value="{{$product->price}}"></div>
            </div>
            <div class="product">
                <label for="description">Описание</label>
                <textarea name="description"placeholder="Description">{{$product->description}}</textarea>
            </div>
            <input type="submit" class="button button_edit" value="Принять изменения">
        </form>
    </div>
@endsection
