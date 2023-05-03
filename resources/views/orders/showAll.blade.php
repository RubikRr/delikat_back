@extends("layouts.main")
@section("order")

<table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <th style="width:200px ;">Инф-ия о заказе</th>
            <th>Фамилия</th>
            <th>Номер телефона</th>
            <th>Дата</th>
            <th>Сумма</th>
        </tr>
    </thead>    
    <tbody>
         @foreach($orders as $order)
          <tr>
             <td><a href="{{route('order.show',$order->id)}}">Подробнее</a></td>
             <td>{{$order->last_name}}</td>
             <td>{{$order->phone_number}}</td>
             <td>{{$order->created_at}}</td>
             <td>{{$order->total}}</td>
         </tr>
          @endforeach
    </tbody>
</table>
   
   
@endsection
