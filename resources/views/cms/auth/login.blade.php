<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('cms/images/favicon.png') }}">
    <link href="{{ asset('cms/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cms/vendor/toastr/css/toastr.min.css') }}">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form >
                                        <div class="form-group">
                                            <label for="email"><strong>Email</strong></label>
                                            <input type="email" id="email" class="form-control" placeholder="hello@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="password"><strong>Password</strong></label>
                                            <input type="password" id="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="remember_me">
                                                    <label class="form-check-label" for="remember_me">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary btn-block" onclick="preformLogin()">Sign me in</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="#">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('cms/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('cms/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/crud.js') }}"></script>
    <script src="{{ asset('cms/vendor/toastr/js/toastr.min.js') }}"></script>

    {{--    <script src="{{ asset('cms/js/custom.min.js') }}"></script>--}}
    <script>
        function preformLogin(){
            let data = {
                email:document.getElementById('email').value,
                password:document.getElementById('password').value,
                remember_me:document.getElementById('remember_me').checked,
            }
            axios.post('/panel/cms/login', data)
                .then(function (response) {
                    console.log(response);
                    showToaster(response.data.massage, true);
                    window.location.href = '{!! route('dashboard') !!}';
                })
                .catch(function (error) {
                    console.log(error.response.data);
                    showToaster(error.response.data.massage, false);
                });
        }
    </script>

</body>

</html>
