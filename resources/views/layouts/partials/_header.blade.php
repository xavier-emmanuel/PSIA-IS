<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="shortcut icon" href="{{ asset(App::environment('production') ? '/public/img/favicon.ico' : '/img/favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset(App::environment('production') ? '/public/img/favicon.ico' : '/img/favicon.ico') }}" type="image/x-icon">

  <title>Patton Security & Investigation Agency</title>

  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/bootstrap/bootstrap.min.css' : '/vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/fontawesome/css/fontawesome-all.min.css' : '/vendors/fontawesome/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/css/main.min.css' : '/css/main.min.css') }}">

  @yield('stylesheets')
</head>
