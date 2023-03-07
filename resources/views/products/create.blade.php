@extends("layouts.main")
@section("product")
<div>
    <form action="{{route("product.store")}}" method="post">
        @csrf
        <div class="form_product">
            <label for="name">Назваение</label>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div class="form_product">
            <label for="description">Описание</label>
            <textarea  name="description"placeholder="Description"></textarea>
        </div>
        <div class="form_product">
            <label for="img">Картинка</label>
            <input type="text" name="img"   placeholder="Img">
        </div>
        <div class="form_product">
            <label for="price">Цена</label>
            <input type="number" name="price"  placeholder="Number">
        </div>

        <button type="submit">Создать</button>
    </form>
</div>
@endsection
