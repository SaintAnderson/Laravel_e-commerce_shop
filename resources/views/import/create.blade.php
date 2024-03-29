@extends(backpack_view('blank'))
@section('header')
    <section class="header-operation container-fluid animated fadeIn d-flex mb-2 align-items-baseline d-print-none"
             bp-section="page-header">
        <h1 class="text-capitalize mb-0" bp-section="page-heading">Загрузка файла</h1>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Пример содержания файла для загрузки
                </div>
                <div class="card-body">
                    <code>
                        [<br/>
                        &nbsp;{<br/>
                        &nbsp;&#9;"title": "Наименование товара",<br/>
                        &nbsp;&#9;"seller_id": 1,<br/>
                        &nbsp;&#9;"category_id": 1,<br/>
                        &nbsp;&#9;"article": "ew3q2h-dfg3h4-443fg-2323-ffgggh",<br/>
                        &nbsp;&#9;"description": "Описание товара",<br/>
                        &nbsp;&#9;"count": 222,<br/>
                        &nbsp;&#9;"order": null,<br/>
                        &nbsp;&#9;"price": 123,<br/>
                        &nbsp;&#9;"old_price": null,<br/>
                        &nbsp;&#9;"is_active": 1,<br/>
                        &nbsp;&#9;"is_limited_edition": 0<br/>
                        &nbsp;&#9;"image_url": "https://via.placeholder.com/300x300.png/0022ee?text=product+quaerat"<br/>
                        &nbsp;},<br/>
                        ]
                    </code>
                </div>
            </div>

        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <form method="post" action="{{ route('import.upload') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-sm-12 mb-3" element="div" bp-field-wrapper="true"
                             bp-field-name="order" bp-field-type="number" bp-section="crud-field">
                            <label>Файл в формате <b>json</b></label>
                            <input type="file" name="file" class="form-control" accept=".json" required=""/>
                            @error('file') <span class="field-error">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                <div id="saveActions" class="form-group my-3">
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-success text-white">
                            <span class="la la-save" role="presentation" aria-hidden="true"></span> &nbsp;
                            <span data-value="save_and_back">Загрузить</span>
                        </button>
                    </div>
                    <a href="{{route('import')}}" class="btn btn-secondary text-decoration-none"><span
                            class="la la-ban"></span> &nbsp;Назад</a>
                </div>
            </form>
        </div>
    </div>
@endsection

