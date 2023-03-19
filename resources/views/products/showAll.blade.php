@extends("layouts.main")
@section("product")
    <div>
        @foreach($products as $product)
                <div ><a  href="{{route("product.show" , $product->id)}}">{{$product->name}}</a> </div>
        @endforeach
            <a href="{{route("product.create")}}">Создать продукт</a>
    </div>
@endsection
