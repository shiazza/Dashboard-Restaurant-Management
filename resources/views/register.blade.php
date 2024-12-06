<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Ze1IH+WfHH3H0UQ2RXfR/4ikMw5QexzAdN6zyhbD/sJURk4bS6xAFb68UEJvZ6RIffXZZuV5dVC+Uq5vv43fBg==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ ('/app.css') }}">
</head>
<body>
<section class="vh-100">
    <div class="container-fluid h-100 d-flex align-items-center">
        <div class="row d-flex justify-content-center align-items-center h-100 w-100">
            <div class="col-md-6 col-lg-5 col-xl-4 text-center mb-5 mb-lg-0">
                <img src="img/cooking.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4 mt-5">
                <form action="{{ route('actionregister') }}" method="post">
                    @csrf

                    <h2 class="text-center mb-4"><b>REGISTER</b></h2>

                    <div class="form-outline mb-4">
                        <label for="email" class="form-label"><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter a valid email address" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="username" class="form-label"><i class="fa fa-user"></i> Username</label>
                        <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Enter your username" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label"><i class="fa fa-key"></i> Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter password" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password_confirmation" class="form-label"><i class="fa fa-key"></i> Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" placeholder="Confirm password" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="role" class="form-label"><i class="fa fa-address-book"></i> Role</label>
                        <select name="role" id="role" class="form-select form-control-lg" required>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>

                    @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-100"><i class="fa fa-user-plus"></i>Register</button>
                        <p class="small fw-bold mt-3">Sudah punya akun? <a href="login" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
