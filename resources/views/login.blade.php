<!doctype html>
<html class="fixed">
<head>
    <title>Sign-In</title>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/assets/css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- Head Libs -->
    <script src="/assets/vendor/modernizr/modernizr.js"></script>

</head>
<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        @if($errors->any())
            <div class="alert alert-danger" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong class="strong">{{$errors->first()}}</strong>
            </div>
        @endif

        <div class="panel card-header">

            <div class="card-title-sign mt-3 text-center">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="fa fa-user mr-1"></i> Sign In</h2>
            </div>
            <div class="card-body">
                <form action="/login_details" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <div class="input-group input-group-icon">
                            <input name="email" type="text" class="form-control form-control-lg" />
                            <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="clearfix">
                            <label class="float-left">Password</label>
                            {{--<a href="/forgot-password" class="float-right">Lost Password?</a>--}}
                        </div>
                        <div class="input-group input-group-icon">
                            <input name="password" type="password" class="form-control form-control-lg" />
                            <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input id="RememberMe" name="rememberme" type="checkbox"/>
                                {{--<label for="RememberMe">Remember Me</label>--}}
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary mt-2">Sign In</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2019. All Rights Reserved.</p>
    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="/assets/vendor/jquery/jquery.js"></script>
<script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="/assets/vendor/popper/umd/popper.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/vendor/common/common.js"></script>
<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/assets/js/theme.js"></script>

<!-- Theme Custom -->
<script src="/assets/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/assets/js/theme.init.js"></script>

</body>
</html>
