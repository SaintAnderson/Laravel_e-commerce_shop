<header class="Section-header Section-header_sm">
    <h2 class="Section-title">Шаг 1. Параметры пользователя
    </h2>
</header>
<div class="row">
    <div class="row-block">
        <div class="form-group">
            <label class="form-label" for="name">Имя
            </label>
            <input class="form-input" id="name" name="first_name" type="text" value="{{ $user->first_name }}"/>
        </div>
        <div class="form-group">
            <label class="form-label" for="name">Фамилия
            </label>
            <input class="form-input" id="name" name="last_name" type="text" value="{{ $user->last_name }}"/>
        </div>
        <div class="form-group">
            <label class="form-label" for="name">Отчество
            </label>
            <input class="form-input" id="name" name="middle_name" type="text" value="{{ $user->middle_name }}"/>
        </div>
        <div class="form-group">
            <label class="form-label" for="mail">E-mail
            </label>
            <input class="form-input" id="mail" name="mail" type="text" value="{{ $user->email }}" data-validate="require"/>
        </div>
        <div class="form-group">
            <label class="form-label" for="name">Купон
            </label>
            <input class="form-input" id="coupon" name="coupon" type="text" value="" placeholder="Введите номер скидочного купона"/>
        </div>
    </div>
</div>
<div class="Order-footer"><a class="btn btn_success Order-next" href="#step2">Дальше</a>
</div>
