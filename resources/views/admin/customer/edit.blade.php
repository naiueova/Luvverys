@extends('admin.dashboard.master')
@section('title', 'Customers')
@section('header')
    @include('admin.dashboard.header')
@endsection
@section('nav')
    @include('admin.dashboard.nav')
@endsection
@section('page', 'Customers')
@section('main')
    @include('admin.dashboard.main')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card mb-4">
            <div class="card-header">Customers Form</div>
            <div class="card-body">
                <form action="{{ route('customer.update', $customers->id) }}" id="frmCustomer" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 ms-3 me-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Name" aria-label="Name" value="{{ $customers->name ?? '' }}">
                    </div>
                    <div class="mb-3 ms-3 me-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="Email" aria-label="Email" value="{{ $customers->email ?? '' }}">
                    </div>
                    <div class="mb-3 ms-3 me-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" aria-label="Password" value="{{ $customers->password ?? '' }}">
                    </div>
                    <div class="mb-3 ms-3 me-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input class="form-control" id="phone" name="phone" type="number" placeholder="Phone" aria-label="Phone" value="{{ $customers->phone ?? '' }}">
                    </div>
                    <div class="mb-3 ms-3 me-3">
                        <label for="address1" class="form-label">Address1</label>
                        <input class="form-control" id="address1" name="address1" type="text" placeholder="Address1" aria-label="Address1" value="{{ $customers->address1 ?? '' }}">
                    </div>
                    <div class="mb-3 ms-3 me-3">
                        <label for="address2" class="form-label">Address2</label>
                        <input class="form-control" id="address2" name="address2" type="text" placeholder="Address2" aria-label="Address2" value="{{ $customers->address2 ?? '' }}">
                    </div>
                    <div class="mb-3 ms-3 me-3">
                        <label for="address3" class="form-label">Address3</label>
                        <input class="form-control" id="address3" name="address3" type="text" placeholder="Address3" aria-label="Address3" value="{{ $customers->address3 ?? '' }}">
                    </div>
                    <div class="row ms-3 me-3 text-right justify-content-end">
                        <div class="col-3">
                            <a href="{{ route('customer.index') }}" class="btn btn-danger w-100">Cancel</a>
                        </div>

                        <div class="col-3">
                            <button type="button" class="btn btn-success w-100" id="save">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const btnSave = document.getElementById("save")
        const form = document.getElementById("frmCustomer")
        const nm = document.getElementById("name")
        const email = document.getElementById("email")
        const pass = document.getElementById("password")
        const phone = document.getElementById("phone")
        const addr1 = document.getElementById("address1")
        const addr2 = document.getElementById("address2")
        const addr3 = document.getElementById("address3")
        let message = ""

        function save() {
            if (nm.value == "") {
                nm.focus()
                swal("Incomplete data", "Name must be filled!", "error")
            } else if (email.value == "") {
                email.focus()
                swal("Incomplete data", "Email must be filled!", "error")
            } else if (pass.value == "") {
                pass.focus()
                swal("Incomplete data", "Password must be filled!", "error")
            } else if (phone.value == "") {
                phone.focus()
                swal("Incomplete data", "Phone must be filled!", "error")
            } else if (addr1.value == "") {
                addr1.focus()
                swal("Incomplete data", "Address1 must be filled!", "error")
            } else if (addr2.value == "") {
                addr2.focus()
                swal("Incomplete data", "Address2 must be filled!", "error")
            } else if (addr3.value == "") {
                addr3.focus()
                swal("Incomplete data", "Address3 must be filled!", "error")
            } else {
                form.submit()
            }
        }

        btnSave.onclick = function() {
            save()
        }
    </script>
@endsection
