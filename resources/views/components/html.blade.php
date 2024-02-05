<!DOCTYPE html>
<html lang="{{ $lang }}">

<head>
    <title>{{ $title }}</title>
    @includeIf('layouts.head')
    {{ $head }}
</head>

<body class="Site">

    {{ $slot }}

    @includeIf('layouts.scripts')
</body>

</html>
