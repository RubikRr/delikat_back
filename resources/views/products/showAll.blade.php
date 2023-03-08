@extends("layouts.main")
@section("product")
    <div>
        @foreach($products as $product)
                <div class="a_product"><a class="my-block" href="{{route("product.show" , $product->id)}}">{{$product->name}}</a> </div>
        @endforeach
    </div>
@endsection
