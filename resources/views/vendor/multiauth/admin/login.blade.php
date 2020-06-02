<!DOCTYPE html>
<html>


<!-- Mirrored from demo.lorvent.com/fitness/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Mar 2020 04:21:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <title>Nutri-Sante</title>

    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- global level css -->
    <link href="{{asset('asset/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- end of global css-->
    <!-- page level styles-->
    <link href="{{asset('asset/admin/vendors/iCheck/skins/all.css')}}" rel="stylesheet" type="text/css">
    <link type="text/css" href="{{asset('asset/admin/vendors/bootstrapvalidator/dist/css/bootstrapValidator.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/admin/css/custom_css/login.css')}}" rel="stylesheet" type="text/css">
    <!-- end of page level styles-->
</head>

<body style="
    font-family: 'Roboto', sans-serif;
    height: 100%;
    padding-top: 8%;
    background: url({{asset('asset/admin/img/image-background.jpg')}}) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">

    <div class="container">
        <div class="full-content-center">
            <div class="box bounceInLeft animated">
                <img src="{{asset('asset/admin/img/logo2.png')}}" style="width:15rem" class="logo" alt="image not found">
                <h3 class="text-center"> Log In</h3>
                <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Admin Login') }}">
                    @csrf

                    <div class="form-group">
                        <label class="sr-only"></label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}"
                                    required autofocus> @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                    </div>
                    <div class="form-group">
                        <label class="sr-only"></label>
                         <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password"
                                    required> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                    </div>

                      <div class="form-group">
                        <label class="sr-only">
                                                       
                                                    </label>

                                                    <select class="form-control" name="shop"  required>
                                                            <option value="no">this is for the shop Select shop </option>
                                                            <option value="shop one">Shop one</option>
                                                             <option value="shop two">Shop two</option>

                                                            
                                                        </select>
                    </div>


                    <div class="checkbox text-left">
                        <label>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>Remember Password
                        </label>
                    </div>
                    <input type="submit" class="btn btn-block btn-warning" value="Log In">
                </form>
                <p class="text-right"><a href="{{route('admin.password.request')}}" class="text-warning forgot_color" style="color: white">Forgot Password?</a></p>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{asset('asset/admin/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script src="{{asset('asset/admin/vendors/iCheck/icheck.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/bootstrapvalidator/dist/js/bootstrapValidator.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/js/custom_js/login1.js')}}" type="text/javascript"></script>
    <!-- end of page level js -->
</body>


<!-- Mirrored from demo.lorvent.com/fitness/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Mar 2020 04:21:07 GMT -->
</html>
