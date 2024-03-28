<div class="Section Section_column Section_columnLeft">
    <div class="wrap">
        <div class="Section-column">
            <div class="Section-columnSection">
                <header class="Section-header">
                    <strong class="Section-title">Поиск
                    </strong>
                </header>
                <div class="Section-columnContent">
                    <form name="find-users" id="find-users" method="get" action="{{url($url)}}">
                        <div class="form-group row">
                            <label for="price_from">Цена от:</label>
                            <input type="number" id="price_from" name="filter[price_from_to][]"
                                   class="price"
                                   value="{{(($request->filter['price_from_to'][0] ?? 0) > $minPrice) ? $request->filter['price_from_to'][0] : $minPrice }}">
                            <label for="price_to">и до:</label>
                            <input type="number" id="price_to" name="filter[price_from_to][]"
                                   class="price"
                                   value="{{(($request->filter['price_from_to'][1] ?? $maxPrice) < $maxPrice) ? $request->filter['price_from_to'][1] : $maxPrice}}">
                        </div>
                        <div class="form-group">
                            <label for="title">Название: </label>
                            <input type="text" id="title" name="filter[title]" class="form-control"
                                   value="{{$request->filter['title'] ?? ''}}">
                        </div>
                        <div class="form-section">
                            <label for="genre">Продавец:
                                <select class="form-select" name="filter[seller_id]" id="seller">
                                    @if(count($sellers) > 1)
                                        <option value="">--Выберите продавца--</option>
                                    @endif
                                    @foreach($sellers as $seller)
                                        <option value={{$seller->id}}
                                                @if(isset($request->filter['seller_id']) && ($request->filter['seller_id'] == $seller->id))
                                                    selected
                                            @endif
                                        >{{$seller->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn_square btn_blue btn_narrow">Найти</button>
                    </form>
                    <br>
                    <a href="{{url($url)}}">
                        <button class="btn btn_square btn_dark btn_narrow" value="">Очистить фильтр поиска
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="Section-content">
            <div class="Sort">
                <strong class="Sort-title">Сортировка:</strong>
                <div class="Sort-variants row">
                    <div class="col-sm-6 col-md-3">
                        <b>По цене</b>
                        <a class="Sort-sortBy Sort-sortBy_dec" href="{{url($url)}}?@include('components.filter')sort=price">
                        </a>
                        <a class="Sort-sortBy Sort-sortBy_inc" href="{{url($url)}}?@include('components.filter')sort=-price">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <b>По новизне</b>
                        <a class="Sort-sortBy Sort-sortBy_dec" href="{{url($url)}}?@include('components.filter')sort=updated_at">
                        </a>
                        <a class="Sort-sortBy Sort-sortBy_inc" href="{{url($url)}}?@include('components.filter')sort=-updated_at">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                    </div>
                    <div class="col-sm-6 col-md-3">
                    </div>
                </div>
            </div>
            <div class="Cards">
                @foreach($products as $product)
                    @include('components.products.product-card', ['product' => $product])
                @endforeach
            </div>
            {{$products->links()}}
        </div>
    </div>
</div>
