<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
</head>
<style>
    .con{
        background-color: #e2e2e2;
        padding: 50px;
        color: #0c0c0c;
        border: 1px solid #9c0505;
    }
</style>
<body>
    <div class="con">
        <h1>Verification email</h1>
        <p> Hello : {{ $user->name }} </p>
        <a href="#">{{ $user->email }}</a>
        <p> OTP : {{ $user->otp_code }} </p>
    </div>
</body>

</html>
