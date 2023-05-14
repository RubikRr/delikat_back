@php use App\Http\Controllers\ProductCategoryController; @endphp
@extends('layouts.app')
@section("product")
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ Storage::url($product->image) }}" alt="{{$product->image}}">
        <div class="card-body h-100 text-center">
            <h5 class="card-title">{{$product->name}}</h5>
        </div>
             <ul class="list-group list-group-flush">
                <li class="list-group-item">{{(new ProductCategoryController)->getCategory($product->category)}}</li>
                <li class="list-group-item">Цена:{{$product->price}}</li>
                <li class="list-group-item">Кол-во:{{$product->quantity}}</li>
                  <li class="list-group-item">{{$product->description}}</li>
            </ul>
            
            <div style="display: flex;justify-content: space-around; margin-top:10px;">
          
                <form action="{{route("product.edit",$product->id)}}" method="get">
                  <div>
                        <input class="btn btn-dark" type="submit"  value="Изменить">

                  </div>
                   

                </form>
                <form action="{{route("product.delete",$product->id)}}" method="post">
                    @csrf
                    @method("delete")
                            <div>
                        <input class="btn btn-danger" type="submit"  value="Удалить">

                            </div>
                    

                </form>
            </div>
        </div>
@endsection
