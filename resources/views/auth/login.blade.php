<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('login') }}" method="post">
        <label for="">email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>
        <label for="">password</label>
        <input type="password" name="password" value="{{ old('password') }}">
        <br>
        <button type="submit">login</button>
    </form>
</body>

</html>
