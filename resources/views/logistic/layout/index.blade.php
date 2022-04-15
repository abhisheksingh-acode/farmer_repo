<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logistic - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('logistics') }}/css/allfarmer.css" />
    <link rel="stylesheet" href="{{ asset('logistics') }}/css/dashboard.css" />
    <link rel="stylesheet" href="{{ asset('logistics') }}/css/add.css">
    <link rel="stylesheet" href="{{ asset('logistics') }}/css/login.css">
    <link href="{{ asset('logistics') }}/css/sidebars.css" rel="stylesheet">


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

    @stack('css')

</head>

<body style="background-color: rgba(235, 235, 235, 0.5);">

    <body>

        <div class="main-container d-flex">

            @include('logistic.include.sidebar')
            @include('logistic.include.header')


            @yield('content')

            <div class="drum-popup">
                <form class="col-11">
                    <div class="my-3 col-12">
                        <input type="number" class="form-control" placeholder="No of Drums">
                    </div>
                    <div class="mb-3 col-12 ">
                        <input type="text" class="form-control" placeholder="Source">
                    </div>
                    <div class="row mb-4 mx-0 px-0">
                        <textarea placeholder="Comment" style="height: 80px;"></textarea>
                    </div>
                    <div class=" d-flex justify-content-between">
                        <a href="#"
                            class="btn btn-primary drum-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Save</a>
                        <a href="#"
                            class="btn btn-primary drum-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Cancel</a>
                    </div>
                </form>
            </div>
            <div class="kg-popup">
                <form class="col-11">
                    <div class="my-3 col-12">
                        <input type="text" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="mb-3 col-12 ">
                        <input type="text" class="form-control" placeholder="Source">
                    </div>
                    <div class="row mb-4 mx-0 px-0">
                        <textarea placeholder="Comment" style="height: 80px;"></textarea>
                    </div>
                    <div class=" d-flex justify-content-between">
                        <a href="#"
                            class="btn btn-primary kg-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Save</a>
                        <a href="#"
                            class="btn btn-primary kg-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Cancel</a>
                    </div>
                </form>
            </div>

            @include('logistic.include.footer')

            @include('logistic.include.foot')

            @stack('js')
