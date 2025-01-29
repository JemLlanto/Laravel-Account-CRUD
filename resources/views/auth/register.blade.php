@extends('layouts.mainLayout')
@section('title', 'Register ')
@section('content')

    <div class="bg-light p-3 rounded d-flex align-items-center flex-column gap-2 shadow">
        <h1 class="m-0">
            Register
        </h1>
        @include('layouts.successAndError')
        <form class="d-flex flex-column gap-1" action="{{ route('registerAccount') }}" method="POST"
            enctype="multipart/form-data" style="width: clamp(30rem, 45dvw, 45rem);">
            @csrf

            <div class="w-100 row mx-auto gap-1">
                <div class="col-md px-0 form-floating">
                    <input class="form-control" type="text" id="firstName" name="firstName" placeholder="firstName">
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="col-md px-0 form-floating">
                    <input class="form-control" type="text" id="lastName" name="lastName" placeholder="lastName">
                    <label for="floatingInput">Last Name</label>
                </div>
            </div>

            <div class="w-100 row mx-auto gap-1">
                <div class="col-md-8 px-0 form-floating">
                    <input class="form-control" type="date" id="birthday" name="birthday" placeholder="Birthday">
                    <label for="floatingInput">Birthday</label>
                </div>
                <div class="col-md px-0 form-floating">
                    <input class="form-control" type="number" id="age" name="age" placeholder="Age">
                    <label for="floatingInput">Age</label>
                </div>
            </div>

            <div class="w-100 row mx-auto gap-1">
                <div class="col-12 px-0 form-floating">
                    <input class="form-control" type="text" id="address" name="address" placeholder="Address">
                    <label for="floatingInput">Address</label>
                </div>
                <div class="col-12 px-0 form-floating">
                    <input class="form-control" type="email" id="email" name="email" placeholder="Email"
                        autocomplete="newEmail">
                    <label for="floatingInput">Email</label>
                </div>
            </div>

            <div class="w-100 row mx-auto gap-1">
                <div class="col-md px-0 form-floating">
                    <input class="form-control" type="password" id="password" name="password" placeholder="Password"
                        autocomplete="newPassword">
                    <label for="floatingInput">Password</label>
                </div>
                <div class="col-md px-0 form-floating">
                    <input class="form-control" type="password" id="con-password" name="password_confirmation"
                        placeholder="Confirm Password">
                    <label for="floatingInput">Confirm Password</label>
                </div>
            </div>

            <button class="btn btn-success py-3 mt-2" type="submit">
                <h5 class="m-0">Register</h5>
            </button>
            <div class="d-flex align-items-center justify-content-center mt-1">
                <p class="m-0">
                    Already have an account? Login <a class="font-weight-bold m-0" href="{{ route('login') }}">here</a>.
                </p>
            </div>
            {{-- <a class="btn btn-secondary py-3 text-decoration-none text-light" href="{{ route('login') }}">
                    <h5 class="m-0">
                        Login
                    </h5>
                </a> --}}
        </form>

    </div>
@endsection
