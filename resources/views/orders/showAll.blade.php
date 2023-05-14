@extends('layouts.app')
@section("order")


<div style="display: flex; justify-content:start; margin-bottom: 10px;">
    <div class="dropdown" style="margin-right:10px">
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Дата</a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item"  href={{route("order.showAll")}}>Все заказы</a></li>
            <li><a class="dropdown-item"  href={{route("orders.getDates",1)}}>Последний день</a></li>
            <li><a class="dropdown-item"  href={{route("orders.getDates",2)}}>Последняя неделя</a></li>
            <li><a class="dropdown-item"  href={{route("orders.getDates",3)}}>Последний месяц</a></li>
            <li><a class="dropdown-item"  href={{route("orders.getDates",4)}}>Последний год</a></li>

        </ul>
    </div>
    <div style="margin-right: 10px;">   
        <form method="GET" action="{{ route('order.statusConfirmed') }}">
            @csrf
            @foreach($orders as $order)
                <input type="hidden" name="my_data[]" value={{$order->id}}>
            @endforeach
                       
            <button class="btn btn-primary" type="submit">Подтверджден</button>
        </form>
    </div>
    <div>   
        <form method="GET" action="{{ route('order.statusNotConfirmed') }}">
            @csrf
            @foreach($orders as $order)
                <input type="hidden" name="my_data[]" value={{$order->id}}>
            @endforeach
            <button class="btn btn-primary" type="submit">Не подтверджден</button>
        </form>
    </div>


</div>
                 
                    


<table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Номер телефона</th>
            <th>Дата(гг-мм-дд)</th>
            <th>Статус</th>
            <th>Сумма</th>
             <th style="width:200px ;">Инф-ия о заказе</th>
        </tr>
    </thead>    
    <tbody>
         @foreach($orders as $order)
          <tr>
             <td>{{$order->last_name}}</td>
             <td>{{$order->first_name}}</td>
             <td>{{$order->phone_number}}</td>
             <td>{{$order->created_at}}</td>
             <td>{{$order->confirmation}}</td>
             <td>{{$order->total}}</td>
             <td><a href="{{route('order.show',$order->id)}}">Подробнее</a></td>
         </tr>
          @endforeach
    </tbody>
     <tfoot>
    <tr>
      <td>Итого</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$sum}} ₽</td>
    </tr>
  </tfoot>
</table>
       

   
@endsection
