@extends("layouts.main")
@section("customer")
    <div class="row">{{$customer->first_name}} </div>
    <div class="row">{{$customer->last_name}} </div>
    <div class="row">{{$customer->phone_number}} </div>
    <div class="row">{{$customer->street}} </div>
    <div class="row">{{$customer->house}} </div>
    <div class="row">{{$customer->housing}} </div>
    <div class="row">{{$customer->entrance}} </div>
    <div class="row">{{$customer->apartment}} </div>


    <div >
        <form action="{{route("customer.delete",$customer->id)}}" method="post">
            @csrf
            @method("delete")
            <div class="btn ">
                <input type="submit"  value="Удалить">
            </div>

        </form>
    </div>

@endsection
