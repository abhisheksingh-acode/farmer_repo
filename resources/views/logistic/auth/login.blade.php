<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logistic - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />


    <style>
        .bg-linear-g {
            background: linear-gradient(90deg, #276feb, #70b5e7);
        }

        input {
            width: 100%;
            max-width: 400px;
        }

        .w-fit {
            width: 100%;
            max-width: 350px;
        }

    </style>
</head>

<body style="height: 100vh;" class="bg-light d-flex justify-content-center align-items-center">
    <div class="w-fit h-50">
        <span class="bg-linear-g px-3 py-2 d-block text-white text-center text-uppercase">Logistic Login</span>
        <form action="{{ route('logistic.login') }}" method="post" id="admin-login-form" autocomplete="off"
            class="bg-white px-3 py-4 shadow">
            @csrf

            @if (Session::get('success'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            @if (Session::get('fail'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        {{ Session::get('fail') }}
                    </div>
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    value="{{ old('email') }}" aria-describedby="emailvalidate" name="email">
                <div id="emailvalidate" class="invalid-feedback">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    value="{{ old('password') }}" aria-describedby="passwordvalidate" name="password">
                <div id="passwordvalidate" class="invalid-feedback">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>


            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-primary px-5">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
