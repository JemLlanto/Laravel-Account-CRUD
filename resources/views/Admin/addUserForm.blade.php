<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    Add User Form

    @if (session('success'))
        <h5>{{ session('success') }}</h5>
    @elseif($errors->any())
        @foreach ($errors->all() as $error)
            <h5>{{ $error }}</h5>
        @endforeach
    @endif
    <form action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" id="firstName" name="firstName" placeholder="First Name">
        <input type="text" id="lastName" name="lastName" placeholder="Last Name">
        <input type="date" id="birthday" name="birthday" placeholder="Birthday">
        <input type="number" id="age" name="age" placeholder="Age">
        <input type="text" id="address" name="address" placeholder="Address">
        <input type="email" id="email" name="email" placeholder="Email">
        <input type="password" id="password" name="password" placeholder="Password">
        <input type="password" id="con-password" name="password_confirmation" placeholder="Confirm Password">
        <input type="file" id="image" name="image" placeholder="">

        <button type="submit">Register</button>
    </form>
</body>

</html>
