@extends("layouts.main")
@section("customer")
    <div>
        <form action="{{route("customer.store")}}" method="post">
            @csrf
            <fieldset>
                <legend style="color: black">Создание нового клиента</legend>
                <div class="labels"><label>Имя*</label></div>
                <div class="input-tab">
                    <input class="input-field" type="text"  name="first_name" placeholder="Введите свое имя" required autofocus>
                </div>

                <div class="labels"><label >Фамилия*</label></div>
                <div class="input-tab">
                    <input class="input-field" type="text"  name="last_name" placeholder="Введите фамилию" required>
                </div>

                <div class="labels"><label id="number-label" >Номер телефона*</label></div>
                <div class="input-tab">
                    <input class="input-field" type="tel"  name="phone_number" maxlength="15"
                            placeholder="Формат: +7-999-67-77" required>
                </div>

                <div class="labels"><label >Улица*</label></div>
                <div class="input-tab">
                    <input class="input-field" type="text"  name="street" placeholder="Введите название улицы" required>
                </div>

                <div class="labels"><label id="number-label" >Номер дома*</label></div>
                <div class="input-tab">
                    <input class="input-field" type="number"  name="house" min="1" max="1000" placeholder="Введите номер дома" required>
                </div>


                <div class="labels"><label id="number-label" >Корпус дома*</label></div>
                <div class="input-tab">
                    <input class="input-field" type="number"  name="housing" min="1" max="100" placeholder="Введите корпус дома" required>
                </div>

                <div class="labels"><label>Номер подъезда</label></div>
                <div class="input-tab">
                <input class="input-field" type="number"  name="entrance" min="1" max="100" placeholder="Введите номер подъезда" required>
                </div>
                <div class="labels"><label>Номер квартиры</label></div>
                <div class="input-tab">
                    <input class="input-field" type="number"  name="apartment" min="1" max="1000" placeholder="Введите номер квартиры" required>
                </div>

                <div class="btn">
                    <button id="submit" type="submit">Создать</button>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
