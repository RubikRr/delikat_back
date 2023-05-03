@extends("layouts.main")
@section("product")
            
            <div class="form-group row" style="margin-top:10px ;">
                <a class="btn btn-success col-sm-2"  href="{{route("product.create")}}">Создать продукт</a>
                    <div class="col-sm-10" style="width: 500px;">
                        <select class="form-select" >
                            <option>Бытовая химия</option>
                            <option>Ватно-бумажная продукция</option>
                            <option>Гигиена полости рта</option>
                            <option>Товары для детской гигиены</option>
                            <option>Товары для мужского бритья</option>
                        </select> 
                    </div> 
            </div>

            <div class=" row row-cols-1 row-cols-md-3 g-4 " style=" margin: 0px;padding-left:135px;" >
                                
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
