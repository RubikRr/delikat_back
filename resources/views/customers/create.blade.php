@extends("layouts.main")
@section("customer")
    <div>
        <form action="{{route("customer.store")}}" method="post">
            @csrf
            <fieldset>
                <legend style="color: black">Создание нового клиента</legend>
                <div><label>Имя*</label></div>
                <div >
                    <input  type="text"  name="first_name" placeholder="Введите свое имя" required autofocus>
                </div>

                <div ><label >Фамилия*</label></div>
                <div >
                    <input  type="text"  name="last_name" placeholder="Введите фамилию" required>
                </div>

                <div ><label >Номер телефона*</label></div>
                <div >
                    <input  type="tel"  name="phone_number" maxlength="15"
                            placeholder="Формат: +7-999-67-77" required>
                </div>

                <div ><label >Улица*</label></div>
                <div >
                    <input  type="text"  name="street" placeholder="Введите название улицы" required>
                </div>

                <div ><label >Номер дома*</label></div>
                <div >
                    <input  type="number"  name="house" min="1" max="1000" placeholder="Введите номер дома" required>
                </div>


                <div ><label  >Корпус дома*</label></div>
                <div >
                    <input  type="number"  name="housing" min="1" max="100" placeholder="Введите корпус дома" required>
                </div>

                <div ><label>Номер подъезда</label></div>
                <div >
                <input  type="number"  name="entrance" min="1" max="100" placeholder="Введите номер подъезда" required>
                </div>
                <div ><label>Номер квартиры</label></div>
                <div >
                    <input  type="number"  name="apartment" min="1" max="1000" placeholder="Введите номер квартиры" required>
                </div>

                <div>
                    <button type="submit">Создать</button>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
