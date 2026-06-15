/**
 * Notification polling - checks for new notifications every 30 seconds
 */
(function() {
    'use strict';

    // Only run if user is authenticated (check if bell icon exists)
    if (!document.getElementById('notif-badge') && !document.querySelector('.fa-bell')) {
        return;
    }

    function fetchNotifications() {
        fetch('/notifications', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            updateNotifBadge(data.unread_count);
            updateNotifList(data.notifications);
        })
        .catch(() => {
            // Silently fail - user may have logged out
        });
    }

    function updateNotifBadge(count) {
        const badge = document.getElementById('notif-badge');
        if (count > 0) {
            if (badge) {
                badge.textContent = count;
                badge.style.display = 'inline';
            } else {
                // Create badge if not exists
                const bell = document.querySelector('.fa-bell');
                if (bell) {
                    const parent = bell.closest('a');
                    const newBadge = document.createElement('span');
                    newBadge.id = 'notif-badge';
                    newBadge.className = 'position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger';
                    newBadge.textContent = count;
                    parent.appendChild(newBadge);
                }
            }
        } else if (badge) {
            badge.style.display = 'none';
        }
    }

    function updateNotifList(notifications) {
        const list = document.getElementById('notification-list');
        if (!list) return;

        if (!notifications || notifications.length === 0) {
            list.innerHTML = '<p class="text-xs text-center text-secondary mb-0 py-3">No notifications yet</p>';
            return;
        }

        list.innerHTML = '';
        notifications.forEach(notif => {
            const item = document.createElement('a');
            item.href = 'javascript:;';
            item.className = 'dropdown-item border-radius-md mb-1 notif-item' + (notif.read_at ? '' : ' bg-light');
            item.dataset.id = notif.id;
            item.innerHTML = `
                <div class="d-flex py-1">
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                            ${notif.read_at ? '' : '<span class="font-weight-bold">New!</span> '}
                            ${notif.data.message || 'New notification'}
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            ${timeAgo(notif.created_at)}
                        </p>
                    </div>
                </div>
            `;
            list.appendChild(item);
        });
    }

    function timeAgo(dateString) {
        const now = new Date();
        const date = new Date(dateString);
        const seconds = Math.floor((now - date) / 1000);

        if (seconds < 60) return 'just now';
        if (seconds < 3600) return Math.floor(seconds / 60) + ' min ago';
        if (seconds < 86400) return Math.floor(seconds / 3600) + 'h ago';
        if (seconds < 172800) return 'yesterday';
        return date.toLocaleDateString();
    }

    // Poll every 30 seconds
    setInterval(fetchNotifications, 30000);

    // Mark individual notification as read
    document.addEventListener('click', function(e) {
        const notifItem = e.target.closest('.notif-item');
        if (notifItem && notifItem.dataset.id) {
            e.preventDefault();
            const id = notifItem.dataset.id;
            fetch('/notifications/' + id + '/read', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            })
            .then(response => response.json())
            .then(() => {
                notifItem.classList.remove('bg-light');
                const newSpan = notifItem.querySelector('.font-weight-bold');
                if (newSpan) newSpan.remove();
                // Update badge count
                fetchNotifications();
            })
            .catch(() => {});
        }
    });

    // Mark all as read
    document.addEventListener('click', function(e) {
        const markAllBtn = e.target.closest('#markAllRead');
        if (markAllBtn) {
            e.preventDefault();
            fetch('/notifications/read-all', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            })
            .then(response => response.json())
            .then(() => {
                fetchNotifications();
            })
            .catch(() => {});
        }
    });
})();