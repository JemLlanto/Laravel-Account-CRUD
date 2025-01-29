@extends('layouts.mainLayout')
@section('title', 'Login')
@section('content')

    <div class="bg-light p-3 rounded d-flex align-items-center flex-column gap-2 shadow">
        <h1 class="m-0">
            Login
        </h1>
        @include('layouts.successAndError')
        <form class="d-flex flex-column gap-2" action="{{ route('loginAccount') }}" method="POST" enctype="multipart/form-data"
            style="width: clamp(20rem, 25dvw, 25rem);">
            @csrf
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="btn btn-success py-3" type="submit">
                <h5 class="m-0">Login</h5>
            </button>

            <div class="d-flex align-items-center justify-content-center">
                <p class="m-0">
                    Dont have an account? Registeasdasdr <a class="  font-weight-bold m-0"
                        href="{{ route('register') }}">here</a>.
                </p>

            </div>
            {{-- <a class="btn btn-secondary py-3 text-decoration-none text-light" href="">
                    <h5 class="m-0">
                        Register
                    </h5>
                </a> --}}


        </form>

    </div>
@endsection
