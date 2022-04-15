<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Warehouse - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('warehouse') }}/css/allfarmer.css" />
    <link rel="stylesheet" href="{{ asset('warehouse') }}/css/dashboard.css" />
    <link rel="stylesheet" href="{{ asset('warehouse') }}/css/add.css">
    <link rel="stylesheet" href="{{ asset('warehouse') }}/css/login.css">
    <link href="{{ asset('warehouse') }}/css/sidebars.css" rel="stylesheet">


    <!-- sidebar -->
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">



    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet">


    <meta name="theme-color" content="#7952b3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>



</head>

<body style="background-color: rgba(235, 235, 235, 0.5);">

    <div class="main-container d-flex">

        @include('warehouse.include.sidebar')

        @include('warehouse.include.header')

        @yield('content')


        @include('warehouse.include.footer')


        @include('warehouse.include.foot')

        @stack('js')
