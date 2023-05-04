@php use App\Http\Controllers\ProductCategoryController; @endphp
@extends("layouts.main")
@section("product")
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ Storage::url($product->image) }}" alt="{{$product->image}}">
        <div class="card-body h-100 text-center">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{(new ProductCategoryController)->getCategory($product->category)}}</p>
            <p class="card-text">{{$product->price}}</p>
            <p class="card-text">{{$product->description}}</p>
            <div style="display: flex;justify-content: space-around;">
          
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
    </div>    
@endsection
