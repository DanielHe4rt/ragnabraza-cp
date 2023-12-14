<div class="flex-shrink-0 p-3 card">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-5 fw-semibold">Control Panel</span>
    </a>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="mb-1">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link link-body-emphasis {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="fw-bold"> > </span> Dashboard
            </a>

            <a href="{{ route('game.overview') }}" class="nav-link link-body-emphasis {{ request()->routeIs('game.overview') ? 'active' : '' }}">
                <span class="fw-bold"> > </span> My Account
            </a>
        </li>
    </ul>
</div>
