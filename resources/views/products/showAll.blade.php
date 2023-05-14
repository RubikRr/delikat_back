@extends('layouts.app')
@section("product")


    <div style="display: flex; justify-content:start; margin-bottom: 10px;">  
        <div style="margin-right: 10px"><a class="btn btn-success" href="{{route("product.create")}}">Создать продукт</a>   </div>
                    
        <div class="dropdown">
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Фильтр</a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item"  href={{route("product.showAll")}}>Все товары</a></li>
                <li><a class="dropdown-item"  href={{route("product.showCategories",1)}}>Бытовая химия</a></li>
                <li><a class="dropdown-item"  href={{route("product.showCategories",2)}}>Ватно-бумажная продукция</a></li>
                <li><a class="dropdown-item"  href={{route("product.showCategories",3)}}>Гигиена полости рта</a></li>
                <li><a class="dropdown-item"  href={{route("product.showCategories",4)}}>Детская гигиена</a></li>
                <li><a class="dropdown-item"  href={{route("product.showCategories",5)}}>Мужское бритье</a></li>
            </ul>
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
                        <p class="card-text">Кол-во:{{$product->quantity}} </p>
                        <a class="btn btn-primary" style="background-color: gre" href="{{route("product.show" , $product->id)}}">Редактировать</a>
                    </div>
            </div>
        </div>
            
        @endforeach
    </div>


        
@endsection
