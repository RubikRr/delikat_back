@extends("layouts.main")
@section("product")
<div>
    <form action="{{route("product.store")}}" method="post">
        @csrf
        <div >
            <div> <label for="name">Назваение</label></div>
           <div><input type="text" name="name" placeholder="Name" autocomplete="off"></div>
        </div>
        <div class="product">
            <div><label for="img">Картинка</label></div>
            <div><input type="text" name="img"   placeholder="Img" autocomplete="off"></div>

        </div>
        <div class="product">
            <div><label for="price">Цена</label></div>
            <div> <input type="number" name="price"  placeholder="Number"></div>

        </div>
        <div class="product">
            <label for="description">Описание</label>
            <textarea  name="description"placeholder="Description"></textarea>
        </div>
        <input type="submit" class="button button_create" value="Создать">
    </form>
</div>
@endsection
