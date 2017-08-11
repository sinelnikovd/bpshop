<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <title>Главная</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset( 'css/bootstrap.min.css' ) }}">
        <link rel="stylesheet" href="{{ asset( 'css/material-kit.css' ) }}">
        <link rel="stylesheet" href="{{ asset( 'css/sumoselect.min.css' ) }}">
        <link rel="stylesheet" href="{{ asset( 'css/_main.min.css' ) }}">
        <link rel="icon" href="{{ asset( 'favicon/favicon.ico' ) }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset( 'favicon/favicon.ico' ) }}" type="image/x-icon">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
    </head>
    @yield('content')

</html>