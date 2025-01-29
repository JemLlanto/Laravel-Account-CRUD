@extends('layouts.mainLayout')
@section('title', 'Dashboard')
@section('content')

    <div style="height: 100%; width: 100%;">
        <nav class="navbar bg-body-tertiary py-3 shadow">
            <div class="w-100 d-flex justify-content-between px-3">
                <div class="w-50container-fluid px-0 d-flex align-items-center">
                    <h5 class="m-0">
                        Dashboard
                    </h5>
                </div>
                <div class="d-flex gap-2">
                    @include('layouts.addUserModal')
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger px-3 d-flex gap-2">
                            <h4 class="m-0 d-flex align-items-center">
                                <i class='bx bx-log-in'></i>
                            </h4>
                            <h5 class="m-0">
                                Logout
                            </h5>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container my-5 pb-5">
            <h1 class="mb-3 text-center">User List</h1>
            <table class="table table-striped-columns rounded overflow-hidden shadow">
                <thead>
                    <tr>
                        <th class="align-middle text-center" scope="col">Profile</th>
                        <th class="align-middle text-center" scope="col">Name</th>
                        <th class="align-middle text-center" scope="col">Birthday</th>
                        <th class="align-middle text-center" scope="col">Age</th>
                        <th class="align-middle text-center" scope="col">Address</th>
                        <th class="align-middle text-center" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <th class="align-middle text-center" scope="row">
                                @if ($account->image)
                                    <div class="m-auto" style="height: 10rem; width: 10rem;">
                                        <img class="rounded" src="{{ asset('storage/' . $account->image) }}" alt=""
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @else
                                    <p class="m-0">No profile</p>
                                @endif
                            </th>
                            <th class="align-middle text-center" scope="row">
                                {{ $account->firstName . ' ' . $account->lastName }}</th>
                            <td class="align-middle text-center">{{ $account->birthday }}</td>
                            <td class="align-middle text-center">{{ $account->age }}</td>
                            <td class="align-middle text-center">{{ $account->address }}</td>
                            <td class="align-middle text-center">
                                <div class="d-flex flex-column gap-2">
                                    @include('layouts.editUserModal')
                                    <form action="{{ route('deleteUser', $account->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure to delete this user?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="w-100 btn btn-danger d-flex justify-content-center gap-2">
                                            <h5 class="m-0 d-flex align-items-center">
                                                <i class='bx bx-trash'></i>
                                            </h5>
                                            <p class="m-0">
                                                Delete
                                            </p>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
