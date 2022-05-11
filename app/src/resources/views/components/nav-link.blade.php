<li class="nav-item">
    <a href="{{ route($routeName) }}" @class(['nav-link', 'active' => $isActive])>{{ $slot }}</a>
</li>
