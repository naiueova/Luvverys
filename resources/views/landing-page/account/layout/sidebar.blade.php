<div class="col-lg-3">
    <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
        <li class="nav-item">
            <a href="{{ route('account.profile') }}" class="nav-link active" id="account-details-tab">Account
                Details</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('account.orders') }}" class="nav-link" id="account-orders-tab">Orders</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('account.address') }}" class="nav-link" id="account-address-tab">Addresses</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('account.logout') }}" class="nav-link" id="account-logout-tab"
                aria-selected="false">Logout</a>
        </li>
    </ul>
</div>
