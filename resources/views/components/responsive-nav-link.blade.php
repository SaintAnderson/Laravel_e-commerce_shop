@props(['active', 'href'])


<li class="menu-item{{ $active ?? false ? '_ACTIVE' : null }} menu-item">
    <a class="menu-link" href="{{ $href }}">{{ $slot }}</a>
</li>