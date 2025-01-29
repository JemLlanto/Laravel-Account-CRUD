<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    Edit User Form


    @if (session('success'))
        <h5>{{ session('success') }}</h5>
    @elseif($errors->any())
        @foreach ($errors->all() as $error)
            <h5>{{ $error }}</h5>
        @endforeach
    @endif
    <form action="{{ route('editUser', $account->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" id="firstName" name="firstName" placeholder="First Name" value="{{ $account->firstName }}">
        <input type="text" id="lastName" name="lastName" placeholder="Last Name" value="{{ $account->lastName }}">
        <input type="date" id="birthday" name="birthday" placeholder="Birthday" value="{{ $account->birthday }}">
        <input type="number" id="age" name="age" placeholder="Age" value="{{ $account->age }}">
        <input type="text" id="address" name="address" placeholder="Address" value="{{ $account->address }}">
        <input type="email" id="email" name="email" placeholder="Email" value="{{ $account->email }}">
        <input type="password" id="password" name="password" autocomplete="new-password" placeholder="New Password">
        <input type="password" id="con-password" name="password_confirmation" placeholder="Confirm Password">
        @if ($account->image)
            <div style="height: 10rem; width: 10rem;">
                <img src="{{ asset('storage/' . $account->image) }}" alt=""
                    style="width: 100%; height: 100%; object-fit: contain;">
            </div>
        @else
            <p></p>
        @endif
        <input type="file" id="image" name="image" placeholder="" value="{{ $account->image }}">

        <button type="submit">Register</button>
    </form>
</body>

</html>
