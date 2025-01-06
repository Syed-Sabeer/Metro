<!DOCTYPE html>
<html>
<head>
    <title>Your Account Credentials</title>
</head>
<body>
    <h1>Welcome, {{ $name }}</h1>
    <p>Your account has been successfully created. Below are your credentials:</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    <p>Please login to your account and change your password for security reasons.</p>
    <p>Thank you!</p>
</body>
</html>
