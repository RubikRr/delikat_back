<x-mail::message>
Ваш заказ
    <div>Имя: {{$order->first_name}} </div>
    <div>Фамилия: {{$order->last_name}} </div>
    <div>Номер телефона: {{$order->phone_number}} </div>
    <div>Почта: {{$order->email}} </div>
    <div>Улица: {{$order->street}} </div>
    <div>Дом: {{$order->house}} </div>
    <div>Корпус: {{$order->housing}} </div>
    <div>Подъезд: {{$order->entrance}} </div>
    <div>Квартира: {{$order->apartment}} </div>
    <div>Продукты ниже пока не вставил</div>
<x-mail::button :url="''">
Подтвердить заказ
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
