
@section("productFields")
    <div >{{$product->name}} </div>
    <p><img src="{{ Storage::url($product->image) }}"width="100" height="111" alt="{{$product->image}}"></p>
    <div >{{$product->price}} </div>
    <div ><textarea>{{$product->description}}</textarea> </div>
@endsection
