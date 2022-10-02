<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="bg-info">

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Login</b></h3></div>
                            <div class="card-body">
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="inputEmail">Email address</label>
                                        <input class="form-control" id="inputEmail" name="email" type="email" placeholder="Your E-mail" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="inputPassword">Password</label>
                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Your Password" />
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-8">--}}
{{--                                            <div class="form-group mb-3">--}}
{{--                                                <label for="inputAvater">Avater</label>--}}
{{--                                                <input class="form-control" id="inputAvater" type="file" placeholder="Avater" />--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            <img src="https://via.placeholder.com/150" alt="" class="img-thumbnail img-fluid float-end" width="90px">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword" name="remember" type="checkbox"/>
                                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                        <button class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="{{route('register')}}">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Nurul Anam 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('backend')}}/js/scripts.js"></script>
</body>
</html>
