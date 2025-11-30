<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left active">
        <a href="#" class="logo logo-normal">
            <img src="{{ asset('assets/img/logowarteg.png') }}" alt="">
        </a>
        <a href="#" class="logo logo-white">
            <img src="{{ asset('assets/img/logowarteg.png') }}" alt="">
        </a>
        <a href="#" class="logo-small">
            <img src="{{ asset('assets/img/logowarteg.png') }}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Notifications -->
        <li class="nav-item dropdown nav-item-box ms-auto" id="notification-dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <i data-feather="bell" style="color: #8f520dff;"></i>
        @if($allPendingOrders->count() > 0)
            <span class="badge rounded-pill" style="background-color: #8f520dff;" id="notification-badge">{{ $allPendingOrders->count() }}</span>
        @endif
    </a>
    <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
            <span class="notification-title">Notifikasi Order</span>
            <a href="javascript:void(0)" class="clear-noti" id="clear-all-noti"> Clear All </a>
        </div>
        <div class="noti-content" style="max-height: 400px; overflow-y: auto;">
            <ul class="notification-list">
                @if($allPendingOrders->count() > 0)
                    @foreach ($allPendingOrders as $order)
                    <li class="notification-message">
                        <a href="javascript:void(0);" onclick="scrollToOrder('{{ $order->order_id }}')">
                            <div class="media d-flex">
                                <div class="media-body flex-grow-1">
                                    <p class="noti-details">
                                        <span class="noti-title">Order Baru Masuk!</span><br>
                                        ID: #{{ $order->order_id }}<br>
                                        No. Telp: {{ str_replace('.', '', $order->phone) }}<br>
                                        Total: Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                    </p>
                                    <p class="noti-time">
                                        <span class="notification-time">{{ $order->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                @else
                    <li class="notification-message">
                        <a href="#">
                            <div class="media d-flex">
                                <div class="media-body flex-grow-1">
                                    <p class="noti-details"><span class="noti-title">Tidak ada notifikasi baru</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="topnav-dropdown-footer">
            <a href="#order-pending-section" onclick="document.getElementById('order-pending-section').scrollIntoView({behavior: 'smooth'})">Lihat Semua Order Pending</a>
        </div>
    </div>
</li>

<style>
/* Custom scrollbar untuk notification dropdown */
.noti-content::-webkit-scrollbar {
    width: 6px;
}

.noti-content::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.noti-content::-webkit-scrollbar-thumb {
    background: #ff8a00;
    border-radius: 10px;
}

.noti-content::-webkit-scrollbar-thumb:hover {
    background: #e67a00;
}
</style>

<script>
// Function untuk scroll ke order tertentu
function scrollToOrder(orderId) {
    // Tutup dropdown notification
    const dropdown = bootstrap.Dropdown.getInstance(document.querySelector('#notification-dropdown .dropdown-toggle'));
    if (dropdown) {
        dropdown.hide();
    }
    
    // Scroll ke section order pending
    const orderSection = document.getElementById('order-pending-section');
    if (orderSection) {
        orderSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    
    // Optional: Highlight order yang diklik (jika mau)
    setTimeout(() => {
        const orderCards = document.querySelectorAll('.order-card');
        orderCards.forEach(card => {
            const orderIdText = card.querySelector('.text-info').textContent;
            if (orderIdText.includes(orderId)) {
                card.style.border = '2px solid #ff8a00';
                card.style.boxShadow = '0 0 15px rgba(255, 138, 0, 0.3)';
                setTimeout(() => {
                    card.style.border = '';
                    card.style.boxShadow = '';
                }, 3000);
            }
        });
    }, 500);
}

// Hide badge when dropdown opened
document.addEventListener('DOMContentLoaded', function() {
    const notificationDropdown = document.getElementById('notification-dropdown');
    if (notificationDropdown) {
        notificationDropdown.addEventListener('show.bs.dropdown', function () {
            const badge = document.getElementById('notification-badge');
            if (badge) {
                badge.style.display = 'none';
            }
        });
        
        notificationDropdown.addEventListener('hide.bs.dropdown', function () {
            const badge = document.getElementById('notification-badge');
            if (badge) {
                badge.style.display = '';
            }
        });
    }
});
</script>
        <!-- /Notifications -->

        {{-- logout button --}}
        <li class="nav-item">
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline ms-3">
                @csrf
                <button type="submit" class="btn" style="background-color: #8f520dff; color: white;" onclick="return confirm('Anda yakin ingin logout?')">
                    Log out Admin
                </button>
            </form>
        </li>

    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="dropdown-item" style="background-color: #ff8a00; color: white;" onclick="return confirm('Anda yakin ingin logout?')">Logout</button>
            </form>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- /Header -->
