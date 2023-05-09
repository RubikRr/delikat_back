@php use App\Http\Controllers\OrderProductController; @endphp
@extends('layouts.app')


@section("order")

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Номер заказа:{{$order->id}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Номер: {{$order->phone_number}}</h6>
                <p class="card-text">Заказчик:{{$order->last_name}} {{$order->first_name}}    
                    <br>Почта: {{$order->email}}
                    <br>Улица: {{$order->street}}
                    <br> Дом: {{$order->house}}
                    <br> Корпус: {{$order->housing}}
                    <br> Подъезд: {{$order->entrance}}
                    <br> Квартира: {{$order->apartment}}
                 </p>
            </div>
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