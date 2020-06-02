<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.lorvent.com/fitness/news.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Mar 2020 04:21:50 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <title>View</title>
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
                <h2>Add New Customer</h2>
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
                                    
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('customer.update')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">
                                               
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Names
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="text" class="form-control" id="usr_name"  name="names" value="{{$customer->names}}">
                                                    </div>
                                                </div>
                                        
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Date of Birth
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="date"  id="contact" class="form-control" name="dob" value="{{$customer->dob}}" />
                                                    </div>
                                                </div>

                                               

                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Sex
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                             <select class="form-control" name="sex" value="" id="sex">
                                                                <option value="{{$customer->sex}}">{{$customer->sex}}</option>
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
                                                            <option value="{{$customer->maritial_Status}}">{{$customer->maritial_Status}}</option>
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
                                                         <input type="text"  id="contact" class="form-control" name="occupation" value="{{$customer->occupation}}" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Phone number
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                       <input type="number"  id="contact" class="form-control" name="phone_no" value="{{$customer->phone_no}}"  />
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Email
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input type="text"  id="contact" class="form-control" name="email" value="{{$customer->email}}"  />
                                                    </div>
                                                </div>
                                            
                                            

                                        
                                             

                                               
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="hidden" name="id" value = "{{$customer->id}}">

                                                        <input type="submit" class="mahesh btn btn-primary" value="Edit"> &nbsp;
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