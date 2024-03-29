<header class="Section-header Section-header_sm">
    <h2 class="Section-title">Шаг 2. Способ доставки
    </h2>
</header>
<div class="form-group">
    @foreach($deliveryMethods as $deliveryMethod)
        <div>
            <label class="toggle">
                <input id="{{ $deliveryMethod->id == 1 ? 'self-method' : 'delivery-method' }}" type="radio" name="delivery_id" value="{{ $deliveryMethod->id }}" {{ $deliveryMethod->id == 1 ? 'checked="checked"' : '' }}/>
                <span class="toggle-box"></span><span class="toggle-text">{{ $deliveryMethod->name }} {{ !empty($deliveryMethod->price) ? sprintf('(+%s рублей)', $deliveryMethod->price) : '' }} </span>
            </label>
        </div>
    @endforeach
</div>
<div id="delivery-address" class="form-group" style="display: none;">
    <label class="form-label" for="address">Адрес
    </label>
    <textarea class="form-textarea" name="address" id="address"></textarea>
</div>
<div class="Order-footer">
    <a class="btn btn_success Order-next" href="#step3">Дальше</a>
</div>
