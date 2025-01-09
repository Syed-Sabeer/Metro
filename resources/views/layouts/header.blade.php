<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Home page</title>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/plugin.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<meta name="user-id" content="{{ auth()->check() ? auth()->user()->id : 'null' }}">
<meta name="room-id" content="{{ session('room_id', '') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
