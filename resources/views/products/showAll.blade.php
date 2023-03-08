@extends("layouts.main")
@section("product")
    <div>
        @foreach($products as $product)
                <div ><a class="a_product my-block" href="{{route("product.show" , $product->id)}}">{{$product->name}}</a> </div>
        @endforeach
    </div>
@endsection
