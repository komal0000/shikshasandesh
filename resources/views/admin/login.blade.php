<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Login Page</title>
</head>

<body class="bg-light">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">

            <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-body p-5">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="text-center mb-4">
                                <h1 class="h3 text-primary fw-bold mb-2">Welcome Back!</h1>
                                <p class="text-muted">Please login to your account</p>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="name@example.com" required>
                                <label for="email">Email address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="customCheck" name="me" value="1">
                                <label class="form-check-label text-muted" for="customCheck">
                                    Remember me
                                </label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                </button>
                            </div>

                            {{-- <div class="text-center mt-4">
                                <a href="#" class="text-muted text-decoration-none">Forgot password?</a>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
