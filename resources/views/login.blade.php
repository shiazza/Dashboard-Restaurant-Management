<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Ze1IH+WfHH3H0UQ2RXfR/4ikMw5QexzAdN6zyhbD/sJURk4bS6xAFb68UEJvZ6RIffXZZuV5dVC+Uq5vv43fBg==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ ('/app.css') }}">
</head>
<body>
<section class="vh-100 mt-5">
    <div class="container-fluid h-100 d-flex align-items-center">
        <div class="row d-flex justify-content-center align-items-center h-100 w-100">
            <div class="col-md-6 col-lg-5 col-xl-4 text-center mb-5 mb-lg-0">
                <img src="img/cooking.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4">
                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf

                    @if(session('error'))
                    <div class="alert alert-danger">
                        <b>Oops!</b> {{ session('error') }}
                    </div>
                    @endif

                    <h2 class="text-center mb-4"><b>LOGIN</b></h2>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" required>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-100"><i class="fa fa-user-plus"></i> Login</button>
                        <p class="small fw-bold mt-3">Belum punya akun? <a href="register" class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
