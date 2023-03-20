@extends("layouts.main")
@section("product")
    <div>
        <form enctype="multipart/form-data" action="{{route("product.update",$product->id)}}" method="post">
            @csrf
            @method("patch")
            <div> <label >Назваение</label></div>
            <dev>
                <input type="text" name="name" placeholder="Name"  autocomplete="off"  value="{{$product->name}}">
            </dev>
            <div ><label  for="image">Картинка *</label></div>
            <div>
                <input  type="file" name="image" placeholder="Картинка" accept=".png,.jpeg,.jpg,.webp" value="{{$product->image}}" required>
            </div>

            <div><label>Цена</label></div>
            <div>
                <input type="number" name="price"  placeholder="Цена"  value="{{$product->price}}">
            </div>

            <div> <label>Описание</label></div>
            <div>
                <textarea name="description"placeholder="Описание">{{$product->description}}</textarea>
            </div>

            <div><input type="submit"  value="Принять изменения"></div>
        </form>
    </div>
@endsection
