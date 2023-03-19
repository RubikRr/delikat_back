@extends("layouts.main")
@section("product")
    <div>
        <form enctype="multipart/form-data" action="{{route("product.update",$product->id)}}" method="post">
            @csrf
            @method("patch")
            <div >
                <div> <label >Назваение</label></div>
                <div><input type="text" name="name" placeholder="Name"  autocomplete="off"  value="{{$product->name}}"></div>
            </div>
            <div >
                <div >
                    <input  type="file" name="image" placeholder="Картинка" accept=".png,.jpeg,.jpg,.webp" value="{{$product->image}}" required></div>

                <div >
            </div>
            <div >
                <div><label>Цена</label></div>
                <div><input type="number" name="price"  placeholder="Цена"  value="{{$product->price}}"></div>
            </div>
            <div >
                <label>Описание</label>
                <textarea name="description"placeholder="Описание">{{$product->description}}</textarea>
            </div>
            <input type="submit"  value="Принять изменения">
        </form>
    </div>
@endsection
