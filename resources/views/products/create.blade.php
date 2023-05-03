@extends("layouts.main")
@section("product")
    <form enctype="multipart/form-data" action="{{route("product.store")}}" method="post">
        @csrf
        <fieldset style="margin:10px;color">
            <legend >Добавление нового товара</legend>


                <div class="form-group row" style="margin:10px;">
                    <label for="name" class="col-sm-2">Имя *</label>     
                    <div class="col-sm-10" style="width: 500px;">
                        <input  type="text" class="form-control" name="name" placeholder="Введите название продукта" required autofocus> 
                    </div>                 
                </div>

                <div class="form-group row" style="margin:10px ;">
                    <label for="category" class="col-sm-2">Категория продукта *</label>
                    <div class="col-sm-10" style="width: 500px;">
                        <select class="form-select" >
                            <option value="Бытовая химия">Бытовая химия</option>
                            <option value="Ватно-бумажная продукция">Ватно-бумажная продукция</option>
                            <option value="Гигиена полости рта">Гигиена полости рта</option>
                            <option value="Товары для детской гигиены">Товары для детской гигиены</option>
                            <option value="Товары для мужского бритья">Товары для мужского бритья</option>
                        </select> 
                    </div> 
                </div>


                <div class="form-group row" style="margin:10px ;">
                    <label class="col-sm-2" for="image">Картинка *</label>
                    <div class="col-sm-10" style="width: 500px;">
                        <input  class="form-control"  type="file" name="image" placeholder="Картинка" accept=".png,.jpeg,.jpg,.webp" required>
                    </div>
                </div>

                <div class="form-group row" style="margin:10px ">
                    <label class="col-sm-2" for="image">Цена *</label>
                    <div class="col-sm-10 input-group flex-nowrap" style="width:500px;">
                         <span class="input-group-text">9.99 ₽</span>
                         <input  type="number" class="form-control" name="price" min="1" max="999999.99"step="0.01"  required>
                    </div>
                </div>

                  


                <div class="form-floating" style="margin: 10px; width: 710px;">
                     <textarea class="form-control" style="height: 100px" placeholder="Описание" name="description"  id="floatingTextarea"></textarea>
                     <label for="floatingTextarea">Описание</label>
                 </div>


            <button type="submit" class="btn btn-success" style="margin:10px">Добавить</button>
        </fieldset>
    </form>
@endsection
