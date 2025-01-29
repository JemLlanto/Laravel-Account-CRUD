<button class="btn btn-primary text-light d-flex gap-2" type="button" data-bs-toggle="modal"
    data-bs-target="#exampleModal">
    <h4 class="m-0 d-flex align-items-center"><i class='bx bx-user-plus'></i></h4>
    <h5 class="m-0">Add new User</h5>
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <h3 class="m-0">Add new user</h3>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column gap-2">
                    @csrf

                    <div class="w-100 row mx-auto gap-1">
                        <div class="col-md px-0 form-floating">
                            <input class="form-control" type="text" id="firstName" name="firstName"
                                placeholder="firstName">
                            <label for="floatingInput">First Name</label>
                        </div>
                        <div class="col-md px-0 form-floating">
                            <input class="form-control" type="text" id="lastName" name="lastName"
                                placeholder="lastName">
                            <label for="floatingInput">Last Name</label>
                        </div>
                    </div>

                    <div class="w-100 row mx-auto gap-1">
                        <div class="col-md-8 px-0 form-floating">
                            <input class="form-control" type="date" id="birthday" name="birthday"
                                placeholder="Birthday">
                            <label for="floatingInput">Birthday</label>
                        </div>
                        <div class="col-md px-0 form-floating">
                            <input class="form-control" type="number" id="age" name="age" placeholder="Age">
                            <label for="floatingInput">Age</label>
                        </div>
                    </div>

                    <div class="w-100 row mx-auto gap-1">
                        <div class="col-12 px-0 form-floating">
                            <input class="form-control" type="text" id="address" name="address"
                                placeholder="Address">
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
                    <div class="input-group mb-3">
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
