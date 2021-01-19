
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Annex - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

    </head>


    <body>


        <!-- Begin page -->

        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-10 m-b-15">
                      INICIO DE SESIÓN
                    </h3>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="email" type="email" required="" placeholder="Usuario">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" name="password" required="" placeholder="Contraseña">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">INGRESAR</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>
