@extends("layouts.main")
@section("product")
   

            <div  style="margin-top:10px;">
                <a class="btn btn-success col-sm-2" style="width: 400px"  href="{{route("product.create")}}">Создать продукт</a>
            </div>

              <ul class="mmenuu">
                <li><a href={{route("product.showAll")}}>Все продукты</a>
                    <ul class="ssubmenuu">
                  
                        <li><a href={{route("product.showCategories",1)}}>Бытовая химия</a></li>
                        <li><a href={{route("product.showCategories",2)}}>Ватно-бумажная продукция</a></li>
                        <li><a href={{route("product.showCategories",3)}}>Гигиена полости рта</a></li>
                        <li><a href={{route("product.showCategories",4)}}>Товары для детской гигиены</a></li>
                        <li><a href={{route("product.showCategories",5)}}>Товары для мужского бритья</a></li>
                    </ul>
                </li>
                </ul>
                <div class="form-group row" style="margin:10px ;">
                    <div class="col-sm-10" style="width: 500px;">
            <select class="form-select" name="category" onchange="window.location.href = this.options[this.selectedIndex].value" >
                            <option value="">Фильтр</option>
                            <option value={{route("product.showAll")}}>Все продукты</option>
                            <option value={{route("product.showCategories",1)}}>Бытовая химия</option>
                            <option value={{route("product.showCategories",2)}}>Ватно-бумажная продукция</option>
                            <option value={{route("product.showCategories",3)}}>Гигиена полости рта</option>
                            <option value={{route("product.showCategories",4)}}>Товары для детской гигиены</option>
                            <option value={{route("product.showCategories",5)}}>Товары для мужского бритья</option>
                        </select> 
                            </div> 
                </div>
            <div class=" row row-cols-1 row-cols-md-3 g-4 " style=" margin: 0px;padding-left:50px;" >
                                
                @foreach($products as $product)
                <div class="col" >
                    <div class="card h-100 text-center " style="width: 16rem; ">
                        <img class="card-img-top" src="{{ Storage::url($product->image)}}"alt="{{$product->image}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}} </p>

                            <a class="btn btn-primary" style="background-color: gre" href="{{route("product.show" , $product->id)}}">Редактировать</a>


                    
                                        </div>
                                </div>
                            </div>
            
                @endforeach
            </div>


        
@endsection
