@extends("layouts.main")
@section("product")
<div>
    <form action="{{route("product.store")}}" method="post">
        @csrf
        <fieldset>
            <legend style="color: black">Создание нового продукты</legend>
        <div class="labels">
            <label id="name-label" for="name">* Name</label></div>
        <div class="input-tab">
            <input class="input-field" type="text" id="name" name="name" placeholder="Enter product name" required autofocus></div>

        <div class="labels">
            <label id="Image" for="email">* Image</label></div>
        <div class="input-tab">
            <input class="input-field" type="text" id="image" name="img" placeholder="Image" required></div>

        <div class="labels">
            <label id="number-label" for="number">* Price</label></div>
        <div class="input-tab">
            <input class="input-field" type="number" id="price" name="price" min="1" max="1000000" placeholder="15" required></div>



        <div class="labels">
            <label for="comments">Description</label></div>
        <div class="input-tab">
            <textarea class="input-field" id="description" name="description" rows="10" cols="40" placeholder="Description"></textarea></div>

        <div class="btn">
            <button id="submit" type="submit">Создать</button>
        </div>
        </fieldset>
    </form>
</div>
@endsection
