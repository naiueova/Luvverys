@extends('admin.dashboard.master')
@section('title', 'Order Detail')
@section('header')
    @include('admin.dashboard.header')
@endsection
@section('nav')
    @include('admin.dashboard.nav')
@endsection
@section('page', 'Order Detail')
@section('main')
    @include('admin.dashboard.main')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">
                    List Order Detail
                    <a href="{{ route('order-detail.create') }}" class="btn btn-primary">Add Order Detail</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderDetails as $idx => $data)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        {{ $idx + 1 . '. ' }}
                                    </div>
                                </td>
                                <td>
                                    {{ $data->product_name }}
                                </td>
                                <td>
                                    {{ $data->customer_id }}
                                </td>
                                <td>
                                    {{ $data->quantity }}
                                </td>
                                <td>
                                    {{ $data->subtotal }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a href="{{ route('order-detail.edit', $data->id) }}"
                                                class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i
                                                    data-feather="edit" style="color: blue"></i></a>
                                        </div>
                                        <form action="{{ route('order-detail.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="delete" onclick="return confirm('Are you sure?')"
                                                class="btn btn-datatable btn-icon btn-transparent-dark"><i
                                                    data-feather="trash-2" style="color: red"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if (Session::has('message'))
    <script>
        swal("Good job!", "{{ Session::get('message') }}", "success");
    </script>
@endif
@endsection
