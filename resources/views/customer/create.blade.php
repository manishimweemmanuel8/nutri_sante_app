<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.lorvent.com/fitness/news.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Mar 2020 04:21:50 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <title>Create customer</title>
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- global css -->
    <link type="text/css" href="{{asset('asset/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/css/custom_css/metisMenu.css')}}" rel="stylesheet" />

    <link type="text/css" rel="stylesheet" href="css/custom_css/panel.css" />
    <!-- end of global css -->
    <!--page level css -->
    <link type="text/css" href="{{asset('asset/admin/vendors/datatables/css/dataTables.bootstrap.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/css/custom_css/fitness.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/vendors/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/css/custom_css/news.css')}}" rel="stylesheet" />

  <script src="http://www.codermen.com/js/jquery.js"></script>



    <!--end of page level css-->


</head>




<body>
    <div class="se-pre-con"></div>
    <!-- header logo: style can be found in header-->
   


        <header class="header">
        <nav class="navbar navbar-static-top">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="{{asset('asset/admin/img/logo2.png')}}" style="width:5rem; " alt="image not found">
            </a>
            <!-- Header Navbar: style can be found in header-->
            <!-- Sidebar toggle button-->
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i class="fa fa-fw fa-navicon"></i>
                </a>
            </div>
            <div class="navbar-right">

                 <ul class="nav navbar-nav">
                
                    <!-- User Account: style can be found in dropdown-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                            <img src="{{asset('asset/admin/img/user.jpg')}}" width="35" class="img-circle img-responsive pull-left" height="35" alt="User Image">
                            <div class="riot">
                                <div>
                               {{ auth('admin')->user()->name }}
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('asset/admin/img/user.jpg')}}" class="img-circle" alt="User Image">
                                <p>{{ auth('admin')->user()->name }}</p>
                            </li>
                            <!-- Menu Body -->
                            <li class="pad-3">
                                 <a href="{{ route('admin.password.change') }}" >
                                    <i  class="fa fa-fw fa-user"></i> Change My password
                                </a>
                            </li>
                            
                            <!-- Menu Footer-->
                            <li class="pad-3">
                                    <a href="/admin/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                        <i class="fa fa-fw fa-sign-out"></i> Logout
                                    </a>
                                     <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>


               
            </div>
        </nav>
    </header>


       <div class="wrapper row-offcanvas row-offcanvas-left"> 


         <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar-->
            <section class="sidebar">
                <div id="menu" role="navigation">
                    <!-- <div class="nav_profile">
                        <div class="media profile-left">
                            <a class="pull-left profile-thumb" href="#">
                                <img src="{{asset('asset/admin/img/user.jpg')}}" class="img-circle" alt="User Image">
                            </a>
                            <div class="content-profile">
                                <h4 class="media-heading">{{ auth('admin')->user()->name }}</h4>
                                <span class="text-default">{{ auth('admin')->user()->role }}</span>
                            </div>
                        </div>
                    </div> -->
                    <ul class="navigation">
                        <li class="" id="">
                            <a href="{{ route('admin.home') }}">
                                <i class="text-primary menu-icon fa fa-fw fa-dashboard"></i>
                                <span class="mm-text ">Dashboard</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="registerCustomer.php">
                                <i class="text-success menu-icon fa fa-fw fa-info-circle"></i>
                                <span class="mm-text">Register Customer</span>
                            </a>
                        </li>
                        <li>
                            <a href="view.php">
                                <i class="text-primary menu-icon fa fa-th fa-info-circle"></i>
                                <span class="mm-text">View</span>
                            </a>
                        </li> -->

                           @guest('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.login')}}">{{ ucfirst(config('multiauth.prefix'))
                                }} Login</a>
                        </li>
                        @else

                        @admin('receptionist')
                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Customer</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('customer.create') }}">
                                        <i class="text-primary menu-icon fa fa-inbox"></i> Register Customer
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.index') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Customer
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Payment</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">

                                <li>
                                    <a href="{{ route('customer.index') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> create Payment
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="{{ route('payment.index') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Payment
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Appointment</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('appointment.create') }}">
                                        <i class="text-primary menu-icon fa fa-inbox"></i> Register appointment
                                    </a>
                                </li>
                               
                                
                            </ul>
                        </li>


                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Report</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('report.first') }}">
                                        <i class="text-primary menu-icon fa fa-inbox"></i> First Time
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('report.second') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Second Time
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('report.more') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> More
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('report.daily') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Daily
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @endadmin


                         @admin('super')

                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">User</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{route('admin.register')}}">
                                        <i class="text-primary menu-icon fa fa-inbox"></i> Create User
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.show') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Users
                                    </a>
                                </li>
                                @permitToParent('Role')
                                @permitTo('CreateRole')
                                 <li>
                                    <a href="{{ route('admin.role.create') }}">
                                        <i class="text-primary menu-icon fa fa-inbox"></i> Create Role
                                    </a>
                                </li>
                                   @endpermitTo
                                <li>
                                    <a href="{{ route('admin.roles') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Role
                                    </a>
                                </li>
                                @endpermitToParent
                            </ul>
                        </li>
                         @endadmin

                         @admin('doctor')

                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Customer Consult</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <!-- <li>
                                    <a href="recordNutrition.php">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Record Nutrition
                                    </a>
                                </li> -->
                                <li>
                                    <a href="{{ route('consultation.customer') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Customer Consult
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                         <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Report</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                              
                                <li>
                                    <a href="{{ route('report.customer') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Customer
                                    </a>
                                </li>

                                 <li>
                                    <a href="{{ route('report.daily') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> daily
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        @endadmin

                         @admin('production')

                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Product</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('product.create') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Record new product
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('product.index') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Products
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                         <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Stock</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('storage.create') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Record product
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('storage.index') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Products
                                    </a>
                                </li>
                                
                                
                                
                            </ul>
                        </li>

                        

                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Request</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                              
                              
                                 <li>
                                    <a href="{{ route('storage.request') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Shop Request
                                    </a>
                                </li>
                                
                            </ul>
                        </li>


                         <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Damage/Other</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                              
                              
                                 <li>
                                    <a href="{{ route('damage.create') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Create
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('damage.index') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> view
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Report</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                              
                              
                                 <li>
                                    <a href="{{ route('buckup.index') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Create daily buckup
                                    </a>
                                </li>

                                 <li>
                                    <a href="{{ route('storage.stock') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Stock
                                    </a>
                                </li>
                                
                            </ul>
                        </li>




                        @endadmin

                        @admin('sales')

                       

                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Request</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                

                                  <li>
                                    <a href="{{ route('shop.request') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Request Products
                                    </a>
                                </li>

                                
                            </ul>
                        </li>

                          <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Sale</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                

                                  <li>
                                    <a href="{{ route('sale.sales',['id'=>rand()]) }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Sall Products
                                    </a>
                                </li>

                                
                            </ul>
                        </li>

                         <li class="menu-dropdown">
                            <a href="#">
                                <i class="text-info menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="mm-text">Report</span>
                                <span class="fa fa-angle-down pull-right"></span>
                            </a>
                            <ul class="sub-menu">
                                <!-- <li>
                                    <a href="registerProduct.php">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Record new product
                                    </a>
                                </li> -->

                                <li>
                                    <a href="{{ route('backup.index') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> Create daily buckup
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('shop.index') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Products
                                    </a>
                                </li>
                               <!--  <li>
                                    <a href="{{ route('shop.customer') }}">
                                        <i class="menu-icon text-success fa fa-pencil"></i> View Customer Products
                                    </a>
                                </li> -->

                            </ul>
                        </li>

                        @endadmin

                        @endguest
                        
                    </ul>
                    <!-- / .navigation -->
                </div>
                <!-- menu -->
            </section>
            <!-- /.sidebar -->
        </aside>





   


 <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Add New Customer </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Register Customer</a>
                    </li>
                </ol>
            </section>
            <!--section ends-->
            <div class="container-fluid">
                <!--main content-->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Add New Customer
                                </h4>
                                <span class="pull-right">
                                    
                                    @if(session()->has('message'))
                                    <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                    </div>
                                        @endif

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('customer.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">
                                               
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Names
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="text" class="form-control" id="usr_name"  name="names">
                                                    </div>
                                                </div>
                                        
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Date of Birth
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="date"  id="contact" class="form-control" name="dob" />
                                                    </div>
                                                </div>

                                               

                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Sex
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                             <select class="form-control" name="sex" value="" id="sex">
                                                                <option value>Select sex</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>



                                               

                                                

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Marital status
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <select class="form-control" name="maritial_Status" >
                                                            <option value>Select status</option>
                                                            <option value="single">Single</option>
                                                            <option value="married">Married</option>
                                                             <option value="separated">separated</option>
                                                            <option value="divorced">divorced</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                 

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Occupation
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="text"  id="contact" class="form-control" name="occupation" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Phone number
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                       <input type="number"  id="contact" class="form-control" name="phone_no" />
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Email
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input type="text"  id="contact" class="form-control" name="email" />
                                                    </div>
                                                </div>

                                                    <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Country
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                             <select class="form-control" name="country" value="" id="country">
                                                                <option value>Select Country</option>
                                                                                                    n>
                                               <option value="Albania">Albania</option>
                                               <option value="Algeria">Algeria</option>
                                               <option value="American Samoa">American Samoa</option>
                                               <option value="Andorra">Andorra</option>
                                               <option value="Angola">Angola</option>
                                               <option value="Anguilla">Anguilla</option>
                                               <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                               <option value="Argentina">Argentina</option>
                                               <option value="Armenia">Armenia</option>
                                               <option value="Aruba">Aruba</option>
                                               <option value="Australia">Australia</option>
                                               <option value="Austria">Austria</option>
                                               <option value="Azerbaijan">Azerbaijan</option>
                                               <option value="Bahamas">Bahamas</option>
                                               <option value="Bahrain">Bahrain</option>
                                               <option value="Bangladesh">Bangladesh</option>
                                               <option value="Barbados">Barbados</option>
                                               <option value="Belarus">Belarus</option>
                                               <option value="Belgium">Belgium</option>
                                               <option value="Belize">Belize</option>
                                               <option value="Benin">Benin</option>
                                               <option value="Bermuda">Bermuda</option>
                                               <option value="Bhutan">Bhutan</option>
                                               <option value="Bolivia">Bolivia</option>
                                               <option value="Bonaire">Bonaire</option>
                                               <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                               <option value="Botswana">Botswana</option>
                                               <option value="Brazil">Brazil</option>
                                               <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                               <option value="Brunei">Brunei</option>
                                               <option value="Bulgaria">Bulgaria</option>
                                               <option value="Burkina Faso">Burkina Faso</option>
                                               <option value="Burundi">Burundi</option>
                                               <option value="Cambodia">Cambodia</option>
                                               <option value="Cameroon">Cameroon</option>
                                               <option value="Canada">Canada</option>
                                               <option value="Canary Islands">Canary Islands</option>
                                               <option value="Cape Verde">Cape Verde</option>
                                               <option value="Cayman Islands">Cayman Islands</option>
                                               <option value="Central African Republic">Central African Republic</option>
                                               <option value="Chad">Chad</option>
                                               <option value="Channel Islands">Channel Islands</option>
                                               <option value="Chile">Chile</option>
                                               <option value="China">China</option>
                                               <option value="Christmas Island">Christmas Island</option>
                                               <option value="Cocos Island">Cocos Island</option>
                                               <option value="Colombia">Colombia</option>
                                               <option value="Comoros">Comoros</option>
                                               <option value="Congo">Congo</option>
                                               <option value="Cook Islands">Cook Islands</option>
                                               <option value="Costa Rica">Costa Rica</option>
                                               <option value="Cote DIvoire">Cote DIvoire</option>
                                               <option value="Croatia">Croatia</option>
                                               <option value="Cuba">Cuba</option>
                                               <option value="Curaco">Curacao</option>
                                               <option value="Cyprus">Cyprus</option>
                                               <option value="Czech Republic">Czech Republic</option>
                                               <option value="Denmark">Denmark</option>
                                               <option value="Djibouti">Djibouti</option>
                                               <option value="Dominica">Dominica</option>
                                               <option value="Dominican Republic">Dominican Republic</option>
                                               <option value="East Timor">East Timor</option>
                                               <option value="Ecuador">Ecuador</option>
                                               <option value="Egypt">Egypt</option>
                                               <option value="El Salvador">El Salvador</option>
                                               <option value="Equatorial Guinea">Equatorial Guinea</option>
                                               <option value="Eritrea">Eritrea</option>
                                               <option value="Estonia">Estonia</option>
                                               <option value="Ethiopia">Ethiopia</option>
                                               <option value="Falkland Islands">Falkland Islands</option>
                                               <option value="Faroe Islands">Faroe Islands</option>
                                               <option value="Fiji">Fiji</option>
                                               <option value="Finland">Finland</option>
                                               <option value="France">France</option>
                                               <option value="French Guiana">French Guiana</option>
                                               <option value="French Polynesia">French Polynesia</option>
                                               <option value="French Southern Ter">French Southern Ter</option>
                                               <option value="Gabon">Gabon</option>
                                               <option value="Gambia">Gambia</option>
                                               <option value="Georgia">Georgia</option>
                                               <option value="Germany">Germany</option>
                                               <option value="Ghana">Ghana</option>
                                               <option value="Gibraltar">Gibraltar</option>
                                               <option value="Great Britain">Great Britain</option>
                                               <option value="Greece">Greece</option>
                                               <option value="Greenland">Greenland</option>
                                               <option value="Grenada">Grenada</option>
                                               <option value="Guadeloupe">Guadeloupe</option>
                                               <option value="Guam">Guam</option>
                                               <option value="Guatemala">Guatemala</option>
                                               <option value="Guinea">Guinea</option>
                                               <option value="Guyana">Guyana</option>
                                               <option value="Haiti">Haiti</option>
                                               <option value="Hawaii">Hawaii</option>
                                               <option value="Honduras">Honduras</option>
                                               <option value="Hong Kong">Hong Kong</option>
                                               <option value="Hungary">Hungary</option>
                                               <option value="Iceland">Iceland</option>
                                               <option value="Indonesia">Indonesia</option>
                                               <option value="India">India</option>
                                               <option value="Iran">Iran</option>
                                               <option value="Iraq">Iraq</option>
                                               <option value="Ireland">Ireland</option>
                                               <option value="Isle of Man">Isle of Man</option>
                                               <option value="Israel">Israel</option>
                                               <option value="Italy">Italy</option>
                                               <option value="Jamaica">Jamaica</option>
                                               <option value="Japan">Japan</option>
                                               <option value="Jordan">Jordan</option>
                                               <option value="Kazakhstan">Kazakhstan</option>
                                               <option value="Kenya">Kenya</option>
                                               <option value="Kiribati">Kiribati</option>
                                               <option value="Korea North">Korea North</option>
                                               <option value="Korea Sout">Korea South</option>
                                               <option value="Kuwait">Kuwait</option>
                                               <option value="Kyrgyzstan">Kyrgyzstan</option>
                                               <option value="Laos">Laos</option>
                                               <option value="Latvia">Latvia</option>
                                               <option value="Lebanon">Lebanon</option>
                                               <option value="Lesotho">Lesotho</option>
                                               <option value="Liberia">Liberia</option>
                                               <option value="Libya">Libya</option>
                                               <option value="Liechtenstein">Liechtenstein</option>
                                               <option value="Lithuania">Lithuania</option>
                                               <option value="Luxembourg">Luxembourg</option>
                                               <option value="Macau">Macau</option>
                                               <option value="Macedonia">Macedonia</option>
                                               <option value="Madagascar">Madagascar</option>
                                               <option value="Malaysia">Malaysia</option>
                                               <option value="Malawi">Malawi</option>
                                               <option value="Maldives">Maldives</option>
                                               <option value="Mali">Mali</option>
                                               <option value="Malta">Malta</option>
                                               <option value="Marshall Islands">Marshall Islands</option>
                                               <option value="Martinique">Martinique</option>
                                               <option value="Mauritania">Mauritania</option>
                                               <option value="Mauritius">Mauritius</option>
                                               <option value="Mayotte">Mayotte</option>
                                               <option value="Mexico">Mexico</option>
                                               <option value="Midway Islands">Midway Islands</option>
                                               <option value="Moldova">Moldova</option>
                                               <option value="Monaco">Monaco</option>
                                               <option value="Mongolia">Mongolia</option>
                                               <option value="Montserrat">Montserrat</option>
                                               <option value="Morocco">Morocco</option>
                                               <option value="Mozambique">Mozambique</option>
                                               <option value="Myanmar">Myanmar</option>
                                               <option value="Nambia">Nambia</option>
                                               <option value="Nauru">Nauru</option>
                                               <option value="Nepal">Nepal</option>
                                               <option value="Netherland Antilles">Netherland Antilles</option>
                                               <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                               <option value="Nevis">Nevis</option>
                                               <option value="New Caledonia">New Caledonia</option>
                                               <option value="New Zealand">New Zealand</option>
                                               <option value="Nicaragua">Nicaragua</option>
                                               <option value="Niger">Niger</option>
                                               <option value="Nigeria">Nigeria</option>
                                               <option value="Niue">Niue</option>
                                               <option value="Norfolk Island">Norfolk Island</option>
                                               <option value="Norway">Norway</option>
                                               <option value="Oman">Oman</option>
                                               <option value="Pakistan">Pakistan</option>
                                               <option value="Palau Island">Palau Island</option>
                                               <option value="Palestine">Palestine</option>
                                               <option value="Panama">Panama</option>
                                               <option value="Papua New Guinea">Papua New Guinea</option>
                                               <option value="Paraguay">Paraguay</option>
                                               <option value="Peru">Peru</option>
                                               <option value="Phillipines">Philippines</option>
                                               <option value="Pitcairn Island">Pitcairn Island</option>
                                               <option value="Poland">Poland</option>
                                               <option value="Portugal">Portugal</option>
                                               <option value="Puerto Rico">Puerto Rico</option>
                                               <option value="Qatar">Qatar</option>
                                               <option value="Republic of Montenegro">Republic of Montenegro</option>
                                               <option value="Republic of Serbia">Republic of Serbia</option>
                                               <option value="Reunion">Reunion</option>
                                               <option value="Romania">Romania</option>
                                               <option value="Russia">Russia</option>
                                               <option value="Rwanda">Rwanda</option>
                                               <option value="St Barthelemy">St Barthelemy</option>
                                               <option value="St Eustatius">St Eustatius</option>
                                               <option value="St Helena">St Helena</option>
                                               <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                               <option value="St Lucia">St Lucia</option>
                                               <option value="St Maarten">St Maarten</option>
                                               <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                               <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                               <option value="Saipan">Saipan</option>
                                               <option value="Samoa">Samoa</option>
                                               <option value="Samoa American">Samoa American</option>
                                               <option value="San Marino">San Marino</option>
                                               <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                               <option value="Saudi Arabia">Saudi Arabia</option>
                                               <option value="Senegal">Senegal</option>
                                               <option value="Seychelles">Seychelles</option>
                                               <option value="Sierra Leone">Sierra Leone</option>
                                               <option value="Singapore">Singapore</option>
                                               <option value="Slovakia">Slovakia</option>
                                               <option value="Slovenia">Slovenia</option>
                                               <option value="Solomon Islands">Solomon Islands</option>
                                               <option value="Somalia">Somalia</option>
                                               <option value="South Africa">South Africa</option>
                                               <option value="Spain">Spain</option>
                                               <option value="Sri Lanka">Sri Lanka</option>
                                               <option value="Sudan">Sudan</option>
                                               <option value="Suriname">Suriname</option>
                                               <option value="Swaziland">Swaziland</option>
                                               <option value="Sweden">Sweden</option>
                                               <option value="Switzerland">Switzerland</option>
                                               <option value="Syria">Syria</option>
                                               <option value="Tahiti">Tahiti</option>
                                               <option value="Taiwan">Taiwan</option>
                                               <option value="Tajikistan">Tajikistan</option>
                                               <option value="Tanzania">Tanzania</option>
                                               <option value="Thailand">Thailand</option>
                                               <option value="Togo">Togo</option>
                                               <option value="Tokelau">Tokelau</option>
                                               <option value="Tonga">Tonga</option>
                                               <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                               <option value="Tunisia">Tunisia</option>
                                               <option value="Turkey">Turkey</option>
                                               <option value="Turkmenistan">Turkmenistan</option>
                                               <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                               <option value="Tuvalu">Tuvalu</option>
                                               <option value="Uganda">Uganda</option>
                                               <option value="United Kingdom">United Kingdom</option>
                                               <option value="Ukraine">Ukraine</option>
                                               <option value="United Arab Erimates">United Arab Emirates</option>
                                               <option value="United States of America">United States of America</option>
                                               <option value="Uraguay">Uruguay</option>
                                               <option value="Uzbekistan">Uzbekistan</option>
                                               <option value="Vanuatu">Vanuatu</option>
                                               <option value="Vatican City State">Vatican City State</option>
                                               <option value="Venezuela">Venezuela</option>
                                               <option value="Vietnam">Vietnam</option>
                                               <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                               <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                               <option value="Wake Island">Wake Island</option>
                                               <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                               <option value="Yemen">Yemen</option>
                                               <option value="Zaire">Zaire</option>
                                               <option value="Zambia">Zambia</option>
                                               <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                        District
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <select id="district" name="district_id" class="form-control"  >
                                                        <option value="" selected disabled>--- Select District ---</option>
                                                          @foreach($districts as $key => $district)
                                                         <option value="{{$key}}"> {{$district}}</option>
                                                         @endforeach
                                                         </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                        Sector
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                       <select name="sector_id" id="sector" class="form-control" >
                                                        </select>
                                                    </div>
                                                </div>

                                        
                                             

                                               
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Save"> &nbsp;
                                                        <input type="button" class="btn btn-danger" value="Cancel"> &nbsp;
                                                        <input type="reset" id="add-news-reset-editable" class="btn btn-default" value="Reset">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col-md-6 -->
                <!--row -->
                <!--row ends-->
            </div>
            <!-- /.content -->
        </aside>


        <script type="text/javascript">
    $('#district').change(function(){
    var districtID = $(this).val();    
    if(districtID){
        $.ajax({
           type:"GET",
           url:"{{url('get-sector-list')}}?district_id="+districtID,
           success:function(res){               
            if(res){
                $("#sector").empty();
                $("#sector").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#sector").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#sector").empty();
            }
           }
        });
    }else{
        $("#sector").empty();
    }      
   });
    
</script>

 </div>
     
            <!-- end footer -->
              
       

    <script src="{{asset('asset/admin/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/js/custom_js/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/js/custom_js/metisMenu.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/datatables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/datatables/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/datatables/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/sweetalert/dist/sweetalert2.js')}}" type="text/javascript"></script>
    <!-- end of page level js -->
    <!-- begining of page level js -->
    <script src="{{asset('asset/admin/js/custom_js/news.js')}}" type="text/javascript"></script>



</body>


<!-- Mirrored from demo.lorvent.com/fitness/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Mar 2020 04:21:00 GMT -->

</html>