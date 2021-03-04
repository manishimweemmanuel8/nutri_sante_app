<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.lorvent.com/fitness/admin_addnews.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Mar 2020 04:21:53 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <title>Nutri-sante</title>
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link type="text/css" href="{{asset('asset/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/css/custom_css/metisMenu.css')}}" rel="stylesheet" />

    <link type="text/css" href="{{asset('asset/admin/css/custom_css/panel.css')}}" rel="stylesheet" />
    <!-- end of global css -->
    <!--page level css -->
    <link type="text/css" href="{{asset('asset/admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/vendors/summernote/summernote.css')}}" rel="stylesheet" media="screen" />
    <link type="text/css" href="{{asset('asset/admin/vendors/tags/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/vendors/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/vendors/bootstrapvalidator/dist/css/bootstrapValidator.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/vendors/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/css/custom_css/fitness.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset/admin/css/custom_css/add_news.css')}}" rel="stylesheet" />
    <!--end of page level css-->
</head>

<body>

    {{-- @foreach($consultations as $consultation) --}}
    <div class="se-pre-con"></div>
    <!-- header logo: style can be found in header-->
    

    <!-- <div class="wrapper row-offcanvas row-offcanvas-left"> -->
        <!-- Left side column. contains the logo and sidebar -->
        
    

        <!-- <aside class="right-side right-padding"> -->

            <img src="{{asset('asset/admin/img/IMG-20200304-WA0013.jpg')}}" style="width:80rem; margin-left: auto; margin-right: auto; display: block; margin-top:30px; margin-bottom:15px" class="logo" alt="image not found">

            <!--section ends-->
            <div class="container-fluid">
                <!--main content-->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                    <h2 style="text-align: center"><u>NUTRITIONAL CONSULTATION FORM</u></h2>
                    <br>
                    <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body mt-3">
                                    
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="m-t-30 pull-left">
                                                <p class="mb-1"><small><strong>Names: </strong></small> {{$consultation->customer->names}}</p>
                                                 <p class="mb-1"><small><strong>Age: </strong></small>{{\Carbon\Carbon::parse($consultation->customer->dob)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days')}}</p>
                                                <p class="mb-1"><small><strong>Sex: </strong></small>{{$consultation->customer->sex}}</p>
                                                <p class="mb-1"><small><strong>Contact: </strong></small>{{$consultation->customer->phone_no}}</p>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-sm-4">
                                            <!-- <div class="m-t-30 pull-right"> -->
                                                <p class="mb-1"><small><strong>Weight: </strong></small>{{$consultation->weight}} kg</p>
                                                <p class="mb-1"><small><strong>Height: </strong></small> {{$consultation->height}} cm</p>
                                                <!-- <p class="mb-1"><small><strong>BMI: </strong></small> {{$consultation->bmi}} </p> -->
                                                <p class="mb-1"><small><strong>W. cir: </strong></small> {{$consultation->ct_munda}}</p>
                                                {{-- @if(is_null($consultation->customer->country))
                                              <p class="mb-1"><small><strong>District: </strong></small> {{DB::table('districts')->where('id', DB::table('customers')->where('id',$consultation->customer_id)->value("district_id"))->value("name")}}</p>
                                                <p class="mb-1"><small><strong>Sector: </strong></small> {{DB::table('sectors')->where('id',DB::table('customers')->where('id',$consultation->customer_id)->value("sector_id"))->value("name")}}</p>
                                            @else --}}
                                               {{-- <p class="mb-1"><small><strong>Country: </strong></small> {{$consultation->customer->country}}</p> --}}

                                         
                                            {{-- @endif --}}
                                            <!-- </div> -->
                                        </div><!-- end col -->
                                        <div class="col-sm-4">
                                            <!-- <div class="m-t-30 pull-right"> -->
                                                {{-- <p class="mb-1"><small><strong>Blood Group: </strong></small>{{$consultation->blood_type}}</p>
                                                <p class="mb-1"><small><strong>Weight: </strong></small>{{$consultation->weight}}kg</p>
                                                <p class="mb-1"><small><strong>Height: </strong></small>{{$consultation->height}}m</p>
                                                {{-- <p class="mb-1"><small><strong>Marital Status: </strong></small>{{$consultation->customer->maritial_Status}}</p>
                                                <p class="mb-1"><small><strong>Profession: </strong></small> {{$consultation->customer->occupation}}</p>
                                                @if(is_null($consultation->customer->country))
                                              <p class="mb-1"><small><strong>District: </strong></small> {{$consultation->customer->district->name}}</p>
                                                <p class="mb-1"><small><strong>Sector: </strong></small> {{$consultation->customer->sector->name}}</p>
                                            @else
                                               <p class="mb-1"><small><strong>Country: </strong></small> {{$consultation->customer->country}}</p>

                                         
                                            @endif --}}
                                            <!-- </div> -->
                                        </div><!-- end col -->
                                    </div>

                                    <br>
                                    <br>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- <div class="m-t-30 pull-right"> -->
                                            @if($consultation->bmi < 18.5)
                                                <p class="mb-1"><small><strong>Diagnosis: </strong></small bgcolor="yellow">Underweight</p>
                                            @elseif($consultation->bmi >= 18.5 && $consultation->bmi <= 24.9 )
                                            <p class="mb-1"><small><strong>Diagnosis: </strong></small bgcolor="green">Ideal BMI</p>
                                            @elseif($consultation->bmi >= 25 && $consultation->bmi <= 29.9 )
                                            <p class="mb-1"><small><strong>Diagnosis: </strong></small bgcolor="orange"> Overweight</p>
                                            @elseif($consultation->bmi >= 30 && $consultation->bmi <= 34.9 )
                                            <p class="mb-1"><small><strong>Diagnosis: </strong></small bgcolor="red"> Obese</p>
                                            @elseif($consultation->bmi >= 35 && $consultation->bmi <= 39.9 )
                                            <p class="mb-1"><small><strong>Diagnosis: </strong></small bgcolor="red">Serverely</p>
                                            @else
                                            <p class="mb-1"><small><strong>Diagnosis: </strong></small bgcolor="red">Morbidly Obese</p>
                                            @endif
                                                <p class="mb-1"><small><strong>Associated Diseases: </strong></small>{{$consultation->associated_deseases}}</p>
                                            <!-- </div> -->
                                        </div><!-- end col -->
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix p-t-50">
                                                <p class="mb-1"><u><strong>Restricted or not advised / ibyo kwirinda</strong></u> :
                                                <small>
                                                    {{$consultation->food_to_avoid}}
                                                </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix p-t-50">
                                                <p class="mb-1"><u><strong>Food to eat in moderation / ibyo kugabanya</strong></u> : 
                                                <small>
                                                     {{$consultation->food_to_reduce}}
                                                </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix p-t-50">
                                                {{-- <p class="mb-1"><small><strong>Contact: </strong></small>{{$consultation->customer->phone_no}}</p> --}}
                                                <p class="mb-1"><u><strong>Recommended / ibyo nemerewe byo kurya</strong></u> : 
                                                <small>
                                                   {{$consultation->food_to_eat}}
                                                </small>
                                            </p>
                                            </div>
                                        </div>
                                    </div>

                                  

                                  

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix p-t-50">
                                                <p class="mb-1"><u><strong>Other advice / Ubundi bujyanama</strong></u> :
                                                <small>
                                                     {{$consultation->bad_nutritional_att}}
                                                </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix p-t-50">
                                                <p class="mb-1"><u><strong>Medication:</strong></u> :
                                                <small>
                                                     {{$consultation->medication}} 
                                                </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                   

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix p-t-50">
                                                <p class="mb-1"><u><strong>BMI:</strong></u> :
                                                <small>
                                                    {{number_format((float)$consultation->bmi, 1, '.', '')}}
                                                </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix p-t-50">
                                                <p class="mb-1"><u><strong>signature of nutritionist and  dietician:</strong></u> </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="hidden-print m-t-30 m-b-30">
                                        <div class="text-right">
                                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            <!-- <a href="#" class="btn btn-success waves-effect waves-light">Submit</a> -->

                                            <a href="{{ route('report.customer')}}" class="btn btn-primary"><i class="fa fa-back"></i> Back</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div> <!-- container -->


                    <div class="footer">
                        <div class="pull-right hide-phone">
                            Printed by <strong class="text-custom">{{ auth('admin')->user()->name }}</strong>.
                        </div>
                        <div>
                            <strong>Nutri-sante</strong> - Copyright © {{date("Y")}}
                        </div>
                    </div>

                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            </div>
            <!-- /.content -->
        <!-- </aside> -->

        {{-- @endforeach --}}
       



    <script src="{{asset('asset/admin/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/js/custom_js/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/js/custom_js/metisMenu.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/holder/holder.js')}}" type="text/javascript"></script>
    <!-- end of page level js -->
    <!-- begining of page level js -->
    <script src="{{asset('asset/admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/tags/dist/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/select2/js/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/moment/moment.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/bootstrapvalidator/dist/js/bootstrapValidator.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/vendors/sweetalert/dist/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/admin/js/custom_js/add_news.js')}}" type="text/javascript"></script>

    </body>

<!-- Mirrored from coderthemes.com/simple/bs4/light/extras-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 18:30:31 GMT -->
</html>