<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <div class="sidenav-menu-heading d-sm-none">Account</div>
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a>

                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Dashboard Pages</div>
                <a class="nav-link {{request()->routeIs('dashboard.*') ? 'active' : ''}}" href="dashboard">
                    <div class="nav-link-icon"><i class="fa-solid fa-house"></i></div>
                    Dashboard
                </a>

                <!-- Sidenav Heading (Custom)-->
                <div class="sidenav-menu-heading">Product Pages</div>
                <a class="nav-link {{request()->routeIs('product-categories.*') ? 'active' : ''}}" href="{{ route('product-categories.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-bread-slice"></i></div>
                    Product Category
                </a>
                <a class="nav-link {{request()->routeIs('product.*') ? 'active' : ''}}" href="{{ route('product.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-cake-candles"></i></div>
                    Product
                </a>

                <!-- Sidenav Heading (UI Toolkit)-->
                <div class="sidenav-menu-heading">Customer Pages</div>
                <a class="nav-link {{request()->routeIs('customer.*') ? 'active' : ''}}" href="{{ route('customer.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                    Customer
                </a>
                <a class="nav-link {{request()->routeIs('order.*') ? 'active' : ''}}" href="{{ route('order.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-basket-shopping"></i></div>
                    Order
                </a>
                <a class="nav-link {{request()->routeIs('order-detail.*') ? 'active' : ''}}" href="{{ route('order-detail.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-receipt"></i></div>
                    Order Detail
                </a>
                <a class="nav-link {{request()->routeIs('payment.*') ? 'active' : ''}}" href="{{ route('payment.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-credit-card"></i></div>
                    Payment
                </a>
                <a class="nav-link {{request()->routeIs('delivery.*') ? 'active' : ''}}" href="{{ route('delivery.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-truck-fast"></i></div>
                    Delivery
                </a>
                <a class="nav-link {{request()->routeIs('product-review.*') ? 'active' : ''}}" href="{{ route('product-review.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-star"></i></div>
                    Product Review
                </a>

                <!-- Sidenav Heading (Custom)-->
                <div class="sidenav-menu-heading">Discount Pages</div>
                <a class="nav-link {{request()->routeIs('discount.*') ? 'active' : ''}}" href="{{ route('discount.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-percent"></i></div>
                    Discount
                </a>

                <!-- Sidenav Heading (Addons)-->
                <div class="sidenav-menu-heading">Account Pages</div>
                <a class="nav-link {{request()->routeIs('user.*') ? 'active' : ''}}" href="{{ route('user.index') }}">
                    <div class="nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    User
                </a>
            </div>
        </div>

        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">Valerie Luna</div>
            </div>
        </div>
    </nav>
</div>
