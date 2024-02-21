<div class="Order Order_anons">
    <div class="Order-personal">
        <div class="row">
            <div class="row-block"><a class="Order-title" href="#">Заказ&#32;<span
                        class="Order-numberOrder">№{{ $id }}</span>&#32;от&#32;<span
                        class="Order-dateOrder">{{ $date }}</span></a>
                    @isset($links)
                        @foreach ($links as $link)
                            <div class="Account-editLink"><a href="{{ $link['href'] }}">{{ $link['name'] }}</a>
                            </div>
                        @endforeach
                    @endisset
            </div>
            <div class="row-block">
                <div class="Order-info Order-info_delivery">
                    <div class="Order-infoType">Тип доставки:
                    </div>
                    <div class="Order-infoContent">{{ $delivery }}
                    </div>
                </div>
                <div class="Order-info Order-info_pay">
                    <div class="Order-infoType">Оплата:
                    </div>
                    <div class="Order-infoContent">{{ $payment }}
                    </div>
                </div>
                <div class="Order-info">
                    <div class="Order-infoType">Общая стоимость:
                    </div>
                    <div class="Order-infoContent">
                        <span class="Order-price">{{ $price }}$</span>
                        @isset ($oldprice) 
                            <span class="Order-price_old">{{ $oldprice }}$</span> 
                        @endisset
                    </div>
                </div>
                <div class="Order-info Order-info_status">
                    <div class="Order-infoType">Статус:
                    </div>
                    <div class="Order-infoContent">{{ $status }}
                    </div>
                </div>
                @empty(trim($slot))
                @else
                    <div class="Order-info Order-info_error">
                        <div class="Order-infoType">Комментарий
                        </div>
                        <div class="Order-infoContent">{{ $slot }}
                        </div>
                    </div>
                @endempty
            </div>
        </div>
    </div>
</div>
