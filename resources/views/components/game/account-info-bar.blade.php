@props(['user'])

<div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <div class="d-flex flex-column">
            <div>{{ $user->userid }}</div>
            <div class="small">Username</div>
        </div>
        <div class="d-flex flex-column">
            <div>{{ auth()->user()->lastlogin?->format('Y-m-d H:i:s') ?: 'Never'}}</div>
            <div class="small">Last Login</div>
        </div>
        <div class="d-flex flex-column">
            <div style="filter:blur(2px); ">{{ $user->last_ip }}</div>
            <div class="small">Last Ip</div>
        </div>
        <div class="d-flex flex-row align-items-center ">
            @if($user->isOnline())
                <span class="badge text-bg-success mx-1">Online</span>
            @else
                <span class="badge text-bg-danger mx-1">Offline</span>
            @endif
            <span class="badge text-bg-info mx-1">{{ $user->getCashPoints() }} Cash</span>
            @if(false)
                <span class="badge text-bg-warning mx-1">VIP</span>
            @endif


        </div>
    </div>
</div>
