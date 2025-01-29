<button class="w-100 btn btn-success d-flex justify-content-center gap-2" type="button" data-bs-toggle="modal"
    data-bs-target="#exampleModal{{ $account->id }}">
    <h5 class="m-0 d-flex align-items-center">
        <i class='bx bx-edit'></i>
    </h5>
    <p class="m-0">
        Edit
    </p>
</button>

<div class="modal fade" id="exampleModal{{ $account->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <h3 class="m-0">Edit {{ $account->firstName }}'s account</h3>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" action="{{ route('editUser', $account->id) }}" method="POST"
                enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column align-items-center gap-2">

                    @csrf

                    <div class="w-100 row mx-auto gap-1">
                        <div class="col-md px-0 form-floating">
                            <input class="form-control" type="text" id="firstName" name="firstName"
                                placeholder="firstName" value="{{ $account->firstName }}">
                            <label for="floatingInput">First Name</label>
                        </div>
                        <div class="col-md px-0 form-floating">
                            <input class="form-control" type="text" id="lastName" name="lastName"
                                placeholder="lastName" value="{{ $account->lastName }}">
                            <label for="floatingInput">Last Name</label>
                        </div>
                    </div>

                    <div class="w-100 row mx-auto gap-1">
                        <div class="col-md-8 px-0 form-floating">
                            <input class="form-control" type="date" id="birthday" name="birthday"
                                placeholder="Birthday" value="{{ $account->birthday }}">
                            <label for="floatingInput">Birthday</label>
                        </div>
                        <div class="col-md px-0 form-floating">
                            <input class="form-control" type="number" id="age" name="age" placeholder="Age"
                                value="{{ $account->age }}">
                            <label for="floatingInput">Age</label>
                        </div>
                    </div>

                    <div class="w-100 row mx-auto gap-1">
                        <div class="col-12 px-0 form-floating">
                            <input class="form-control" type="text" id="address" name="address"
                                placeholder="Address" value="{{ $account->address }}">
                            <label for="floatingInput">Address</label>
                        </div>
                        <div class="col-12 px-0 form-floating">
                            <input class="form-control" type="email" id="email" name="email" placeholder="Email"
                                autocomplete="newEmail" value="{{ $account->email }}">
                            <label for="floatingInput">Email</label>
                        </div>
                    </div>

                    <div class="w-100 row mx-auto gap-1">
                        <div class="col-md px-0 form-floating">
                            <input class="form-control" type="password" id="password" name="password"
                                placeholder="Password" autocomplete="newPassword">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="col-md px-0 form-floating">
                            <input class="form-control" type="password" id="con-password" name="password_confirmation"
                                placeholder="Confirm Password">
                            <label for="floatingInput">Confirm Password</label>
                        </div>
                    </div>
                    @if ($account->image)
                        <div style="height: 10rem; width: 10rem;">
                            <img src="{{ asset('storage/' . $account->image) }}" alt=""
                                style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                    @else
                        <p></p>
                    @endif
                    <div class="input-group mb-3">
                        <input class="form-control" type="file" id="image" name="image"
                            value="{{ $account->image }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
