@extends ('layouts.default')

@section ('content')
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">@yield('name')
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="/">home</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>
                            @yield('name')
                        </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section Section_column Section_columnLeft">
            <div class="wrap">
                @include('layouts.account.navigation')
                <div class="Section-content">
                    @yield('account-content')
                </div>
            </div>
        </div>
    </div>
@endsection