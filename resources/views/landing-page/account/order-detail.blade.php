@extends('landing-page.landing.main')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="{{ asset('assets/img/others/Breadcrumbs-bg_1920x503.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>My Account</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li> // My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <div class="account-page-area">
        <div class="container">
            <div class="row">
                @include('landing-page.account.layout.sidebar')
                <div class="col-lg-9">
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-details" role="tabpanel"
                            aria-labelledby="account-details-tab">
                            <div class="container-fluid">

                                <div class="container">
                                    <!-- Title -->
                                    <div class="d-flex justify-content-between align-items-center py-3">
                                        <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order
                                            {{ $order->order_no }}</h2>
                                    </div>

                                    <!-- Main content -->
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <!-- Details -->
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="mb-3 d-flex justify-content-between align-items-center border p-3">
                                                        <div>
                                                            <span class="me-3">{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</span>
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="rounded-pill
                                                                @if ($order->status == 'pending') badge bg-warning
                                                                @elseif ($order->status == 'shipped')
                                                                    badge bg-primary
                                                                @elseif ($order->status == 'delivered')
                                                                    badge bg-success
                                                                @else
                                                                    badge bg-danger @endif
                                                                ">
                                                                {{ $order->status }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            @foreach ($orderDetail as $item)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex mb-2">
                                                                            <div class="flex-shrink-0">
                                                                                <img src="{{ asset('storage/' . $item->image1_url) }}"
                                                                                    alt="" width="35"
                                                                                    class="img-fluid">
                                                                            </div>
                                                                            <div class="flex-lg-grow-1 ms-3">
                                                                                <h6 class="small mb-0"><a href="#"
                                                                                        class="text-reset">{{ $item->product_name }}</a></h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ $item->quantity }}</td>
                                                                    <td class="text-end">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="2">Subtotal</td>
                                                                <td class="text-end">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                                                            </tr>
                                                            @if (!empty($order->discount))
                                                            <tr>
                                                                <td colspan="2">Discount (Code: {{ $order->discount }})</td>
                                                                <td class="text-danger text-end">-$10.00</td>
                                                            </tr>
                                                            @endif
                                                            <tr class="fw-bold">
                                                                <td colspan="2">TOTAL</td>
                                                                <td class="text-end">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Payment -->
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <h3 class="h6">Payment Method</h3>
                                                            <p>Visa -1234 <br>
                                                                Total: $169,98 <span
                                                                    class="badge bg-success rounded-pill">PAID</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <!-- Customer Notes -->
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <h3 class="h6">Customer Notes</h3>
                                                    <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis
                                                        cum sem aliquet mauris rutrum. Sollicitudin. Morbi, sem tellus
                                                        vestibulum porttitor.</p>
                                                </div>
                                            </div>
                                            <div class="card mb-4">
                                                <!-- Shipping information -->
                                                <div class="card-body">
                                                    <h3 class="h6">Shipping Information</h3>
                                                    <strong>FedEx</strong>
                                                    <span><a href="#" class="text-decoration-underline"
                                                            target="_blank">FF1234567890</a> <i
                                                            class="bi bi-box-arrow-up-right"></i> </span>
                                                    <hr>
                                                    <h3 class="h6">Address</h3>
                                                    <address>
                                                        <strong>John Doe</strong><br>
                                                        1355 Market St, Suite 900<br>
                                                        San Francisco, CA 94103<br>
                                                        <abbr title="Phone">P:</abbr> (123) 456-7890
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
