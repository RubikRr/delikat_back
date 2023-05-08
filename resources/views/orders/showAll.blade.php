@extends("layouts.main")
@section("order")
  <div class="form-group row" style="margin:10px ;">
                    <div class="col-sm-10" style="width: 500px;">
                        <select class="form-select" name="category" onchange="window.location.href = this.options[this.selectedIndex].value" >
                            <option value="">Фильтр</option>
                            <option value={{route("order.showAll")}}>Все заказы</option>
                            <option value={{route("orders.getDates",1)}}>Последний день</option>
                            <option value={{route("orders.getDates",2)}}>Последняя неделя</option>
                            <option value={{route("orders.getDates",3)}}>Последний месяц</option>
                            <option value={{route("orders.getDates",4)}}>Последний год</option>
                        </select> 
                    </div> 
                </div>
<table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Номер телефона</th>
            <th>Дата(гг-мм-дд)</th>
            <th>Подтв.</th>
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
