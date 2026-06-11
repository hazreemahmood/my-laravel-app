@auth
@php
    $unreadCount = auth()->user()->unreadNotifications()->count();
    $latestNotifications = auth()->user()->notifications()->latest()->take(5)->get();
@endphp
<li class="nav-item dropdown pe-2 d-flex align-items-center">
    <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="notifDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell cursor-pointer"></i>
        @if($unreadCount > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notif-badge">
                {{ $unreadCount }}
            </span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="notifDropdown" style="min-width: 320px;">
        <div class="d-flex justify-content-between align-items-center mb-3 px-2">
            <h6 class="mb-0">Notifications</h6>
            @if($unreadCount > 0)
                <a href="javascript:;" class="text-primary text-xs font-weight-bold" id="markAllRead">Mark all as read</a>
            @endif
        </div>
        <div id="notification-list">
            @forelse($latestNotifications as $notification)
                <a href="javascript:;" class="dropdown-item border-radius-md mb-1 notif-item {{ $notification->read_at ? '' : 'bg-light' }}" data-id="{{ $notification->id }}">
                    <div class="d-flex py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1">
                                @if(!$notification->read_at)
                                    <span class="font-weight-bold">New!</span>
                                @endif
                                {{ $notification->data['message'] ?? 'New notification' }}
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-xs text-center text-secondary mb-0 py-3">No notifications yet</p>
            @endforelse
        </div>
    </div>
</li>
@endauth