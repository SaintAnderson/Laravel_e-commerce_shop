@extends(backpack_view('blank'))
@section('header')
    <section class="header-operation container-fluid animated fadeIn d-flex mb-2 align-items-baseline d-print-none"
             bp-section="page-header">
        <h1 class="text-capitalize mb-0" bp-section="page-heading">Импорт товаров</h1>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-print-none with-border">
                <a href="{{route('import.create')}}"
                   class="btn btn-primary {!! $disabled = ($find == 1) ? 'disabled' : '' !!}" data-style="zoom-in">
                    <span><i class="la la-plus"></i> Добавить</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table
                class="table table-striped table-hover nowrap rounded card-table table-vcenter card d-table shadow-xs border-xs dataTable dtr-inline">
                <tr>
                    <th>Дата</th>
                    <th>Добавил</th>
                    <th>Файл</th>
                    <th>Статус</th>
                </tr>
                @if(count($rows) > 0)
                    @foreach($rows as $row)
                        <tr>
                            <td>{!!date("d.m.Y", strtotime($row->created_at))!!}</td>
                            <td>{{$row->user->first_name}}</td>
                            <td>{{$row->filename}}</td>
                            <td>{{$row->status}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Ничего нет</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@endsection
