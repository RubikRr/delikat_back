@php use App\Http\Controllers\OrderProductController; @endphp
@extends('layouts.app')


@section("order")

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Заказ номер: {{$order->id}}</h5>
            </div>
             <ul class="list-group list-group-flush">
                <li class="list-group-item">Номер: {{$order->phone_number}}</li>
                <li class="list-group-item">Заказчик:{{$order->last_name}} {{$order->first_name}}</li>
                <li class="list-group-item">Почта: {{$order->email}}</li>
                <li class="list-group-item">Улица: {{$order->street}}</li>
                <li class="list-group-item">Дом: {{$order->house}}</li>
                <li class="list-group-item">Корпус: {{$order->housing}}</li>
                <li class="list-group-item">Подъезд: {{$order->entrance}}</li>
                <li class="list-group-item">Квартира: {{$order->apartment}}</li>
            </ul>
        </div>
    <table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <th>Продукты</th>
            <th>Кол-во</th>
        </tr>
    </thead>    
    <tbody>
         @foreach($orderProducts as $orderProduct)
          <tr>
             <td>{{(new OrderProductController)->getName($orderProduct->product_id)}}</td>
             <td>{{$orderProduct->quantity}} шт.</td>
         </tr>
          @endforeach
    </tbody>
     <tfoot>
    <tr>
      <td>Итого</td>
      <td>{{$order->total}} ₽</td>
    </tr>
  </tfoot>
</table>
<div style="display: flex; justify-content: space-between;">
    
 <div>
        <form enctype="multipart/form-data" action="{{route("order.decrease",$order->id)}}" method="post">
            @csrf
            @method("patch")
            <div>
                <input class="btn btn-dark" type="submit" value="Подтвердить заказ">
            </div>

        </form>
    </div>
    <div>
        <form action="{{route("order.delete",$order->id)}}" method="post">
            @csrf
            @method("delete")
            <div>
                <input class="btn btn-danger" type="submit" value="Удалить">
            </div>

        </form>
    </div>
</div>

@endsection