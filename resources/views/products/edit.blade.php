@extends("layouts.main")
@section("product")
    <div>
        <form action="{{route("product.update",$product->id)}}" method="post">
            @csrf
            @method("patch")
            <div class="form_product">
                <label for="name">Назваение</label>
                <input type="text" name="name" placeholder="Name" value="{{$product->name}}">
            </div>
            <div class="form_product">
                <label for="description">Описание</label>
                <textarea  name="description"placeholder="Description">{{$product->description}}</textarea>
            </div>
            <div class="form_product">
                <label for="img">Картинка</label>
                <input type="text" name="img"   placeholder="Img" value="{{$product->img}}">
            </div>
            <div class="form_product">
                <label for="price">Цена</label>
                <input type="number" name="price"  placeholder="Number" value="{{$product->price}}">
            </div>

            <button type="submit">Изменить</button>
        </form>
    </div>
@endsection
