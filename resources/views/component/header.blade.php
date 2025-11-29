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
                <div class="noti-content">
                    <ul class="notification-list">
                        @if($allPendingOrders->count() > 0)
                            @foreach ($allPendingOrders->take(5) as $order)
                            <li class="notification-message">
                                <a href="{{ route('penjual.dashboard') }}#showPendingOrders">
                                    <div class="media d-flex">
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">Order Baru Masuk!</span><br>
                                                ID: {{ $order->order_id }}<br>
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
                    <a href="{{ route('penjual.dashboard') }}#showPendingOrders">Lihat Semua Order Pending</a>
                </div>
            </div>
        </li>
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
