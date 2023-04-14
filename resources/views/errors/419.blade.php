@extends('errors::minimal')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>419 Page Expired</title>
    @vite(['resources/css/error.css'])
</head>
<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>419</h1>
                <h2>Page Expired</h2>
            </div>
            <a href="{{ route('login') }}">back to login</a>
        </div>
    </div>
</body>
</html>

