@extends("layouts.main")
@section("customer")
    <form action="{{route("customer.update",$customer->id)}} " method="post">
        @csrf
        @method("patch")
        <div ><label>Имя*</label></div>
        <div >
            <input  type="text"  name="first_name" value="{{$customer->first_name}}" placeholder="Введите свое имя" required autofocus>
        </div>

        <div><label >Фамилия*</label></div>
        <div >
            <input  type="text"  name="last_name"  value="{{$customer->last_name}}" placeholder="Введите фамилию" required>
        </div>

        <div ><label  >Номер телефона*</label></div>
        <div>
            <input  type="tel"  name="phone_number"  value="{{$customer->phone_number}}"maxlength="15"
                   placeholder="Формат: +7-999-67-77" required>
        </div>

        <div ><label >Улица*</label></div>
        <div >
            <input  type="text"  name="street"  value="{{$customer->street}}"placeholder="Введите название улицы" required>
        </div>

        <div ><label >Номер дома*</label></div>
        <div >
            <input  type="number"  name="house"  value="{{$customer->house}}"min="1" max="1000" placeholder="Введите номер дома" required>
        </div>


        <div ><label  >Корпус дома*</label></div>
        <div>
            <input  type="number"  name="housing"  value="{{$customer->housing}}"min="1" max="100" placeholder="Введите корпус дома" required>
        </div>

        <div ><label>Номер подъезда</label></div>
        <div>
            <input type="number"  name="entrance"  value="{{$customer->entrance}}"min="1" max="100" placeholder="Введите номер подъезда" required>
        </div>
        <div ><label>Номер квартиры</label></div>
        <div>
            <input  type="number"  name="apartment"  value="{{$customer->apartment}}" min="1" max="1000" placeholder="Введите номер квартиры" required>
        </div>

        <div >
            <button id="submit" type="submit">Изменить</button>
        </div>
    </form>
@endsection
