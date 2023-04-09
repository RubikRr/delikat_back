@extends("layouts.main")
@section("product")
<div>
    <form enctype="multipart/form-data" action="{{route("product.store")}}" method="post">
        @csrf
        <fieldset>
            <legend >Создание нового продукты</legend>
        <div>
            <label for="name">Имя *</label></div>
        <div >
            <input  type="text"  name="name" placeholder="Введите название продукта" required autofocus>
        </div>

        <div >
            <label  for="image">Картинка *</label></div>
        <div >
            <input  type="file" name="image" placeholder="Картинка" accept=".png,.jpeg,.jpg,.webp" required>
        </div>

        <div >
            <label for="number">Цена *</label></div>
        <div >
            <input  type="number"  name="price" min="1" max="999999.99" placeholder="50.25" step="0.01"  required>
        </div>

        <div >
            <label >Описание</label></div>
        <div >
            <textarea name="description" rows="10" cols="40" placeholder="Описание"></textarea>
        </div>

        <div >
            <button type="submit">Создать</button>
        </div>
        </fieldset>
    </form>
</div>
@endsection
