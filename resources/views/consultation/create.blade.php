@extends('multiauth::layouts.app') 
@section('content')
 <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Add Consultation results</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Consultation results</a>
                    </li>
                </ol>
            </section>
            <!--section ends-->
            <div class="container-fluid">
                <!--main content-->

 <!--================B.Anthropometric Measurements====================================================================================================================================================================================   -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Anthropometric Measurements
                                </h4>
                                <span class="pull-right">
                                </span>
                            </div>
                            <div class="panel-body">
                                  @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('consultation.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

                                                  <div class="form-group" hidden>
                                                    <label class="col-md-3 control-label" for="usr_name">
                                                        Id
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-user-md text-primary"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="field_ucfirst"  name="customer_id" value="{{$customer->id}}"  >
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="form-group" hidden>
                                                    <label class="col-md-3 control-label" for="usr_name">
                                                        Id
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-user-md text-primary"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="field_ucfirst"   name="payment_id" value="{{$id}}">
                                                        </div>
                                                    </div>
                                                </div>
                                     
                                               <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                        Blood type
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        @if($consultation)
                                                        <input type="text" 
                                                        name="blood_type" value="{{$consultation->blood_type}}"   hidden>
                                                        <label for="contactChoice2">{{$consultation->blood_type}}</label>
                                                        &nbsp;
                                                        @else
                                                        <input type="radio" id="contactChoice1"
                                                        name="blood_type" value="A" required >
                                                        <label for="contactChoice1">A</label>
                                                        &nbsp;


                                                        <input type="radio" id="contactChoice2"
                                                        name="blood_type" value="B" required>
                                                        <label for="contactChoice2">B</label>
                                                        &nbsp;

                                                        <input type="radio" id="contactChoice3"
                                                        name="blood_type" value="AB" required>
                                                        <label for="contactChoice3">AB</label>
                                                        &nbsp;

                                                        <input type="radio" id="contactChoice3"
                                                        name="blood_type" value="O" required>
                                                        <label for="contactChoice3">O</label>
                                                        &nbsp;
                                                        
                                                        <input type="radio" id="contactChoice3"
                                                        name="blood_type" value="UNK" required>
                                                        <label for="contactChoice3">UNK</label>

                                                        @endif
                                                    </div> 

                                               
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Weight(Kg)
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="weight"  required>
                                                        
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Height(meter)
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        @if($consultation)
                                                        <input class="tags_options fill_it form-control" id="field_ucfirst" multiple="multiple" name="height" value="{{$consultation->height}}" required>
                                                        @else
                                                        <input class="tags_options fill_it form-control" id="field_ucfirst" multiple="multiple" name="height" required>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Waist Circumfrence
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input class="tags_options fill_it form-control" id="field_ucfirst" multiple="multiple" name="ct_munda" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        MUAC
                                                        <span class='require'></span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input class="tags_options fill_it form-control" id="field_ucfirst" multiple="multiple" name="ct_ukuboko" >
                                                    </div>
                                                </div>

                           

                                                <!-- <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Associated Diseases
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input class="tags_options fill_it form-control" id="field_ucfirst" multiple="multiple" name="associated_deseases" required>
                                                    </div>
                                                </div> -->

                                                <!-- <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                        Reason 
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="reason" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div> -->

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                        Others 
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Submit"> &nbsp;
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


<!--================C.Past Medical History====================================================================================================================================================================================   -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Past Medical History
                                </h4>
                                <span class="pull-right">
                                </span>
                            </div>
                            <div class="panel-body">
                                  @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('consultation.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                         
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Submit"> &nbsp;
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

                
<!--==============D. Any Chronic or Existing Condition======================================================================================================================================================================================   -->


<div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Any Chronic or Existing Condition
                                </h4>
                                <span class="pull-right">
                                </span>
                            </div>
                            <div class="panel-body">
                                  @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('consultation.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                         1
                                                    </label>
                                                    <div class="col-md-7 " style="margin: 0 auto">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="weight"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                         2
                                                    </label>
                                                    <div class="col-md-7 " style="margin: 0 auto">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="weight"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                         3
                                                    </label>
                                                    <div class="col-md-7 " style="margin: 0 auto">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="weight"  required>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                         4
                                                    </label>
                                                    <div class="col-md-7 " style="margin: 0 auto">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="weight"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                         5
                                                    </label>
                                                    <div class="col-md-7 " style="margin: 0 auto">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="weight"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                         6
                                                    </label>
                                                    <div class="col-md-7 " style="margin: 0 auto">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="weight"  required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                        Pregnant
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        
                                                        <input type="radio" id="contactChoice1"
                                                        name="blood_type" value="yes" required >
                                                        <label for="contactChoice1">Yes</label>
                                                        &nbsp;


                                                        <input type="radio" id="contactChoice2"
                                                        name="blood_type" value="no" required>
                                                        <label for="contactChoice2">No</label>
                                                        &nbsp;
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="categry">
                                                            Due Date
                                                            <span class='require'>*</span>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input type="date" class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date"  required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="categry">
                                                        Primary Care Provider
                                                            <span class='require'>*</span>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date"  required>
                                                        </div> 
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="categry">
                                                        Date of last physical exam  
                                                            <span class='require'>*</span>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input type="date" class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date"  required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="categry">
                                                        Other doctors or practitioners you see  
                                                            <span class='require'>*</span>
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date"  required>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Submit"> &nbsp;
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

<!--==============E. Medication, Supplement, and Antibiotic Intake======================================================================================================================================================================================   -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Medication, Supplement, and Antibiotic Intake
                                </h4>
                                <span class="pull-right">
                                </span>
                            </div>
                            <div class="panel-body">
                                  @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('consultation.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Please provide the names of medications, supplements, and/or antibiotics currently taken:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Submit"> &nbsp;
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

<!--==============F. Goals and Readiness Assessment======================================================================================================================================================================================   -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Goals and Readiness Assessment
                                </h4>
                                <span class="pull-right">
                                </span>
                            </div>
                            <div class="panel-body">
                                  @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('consultation.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     I would like to visit with the dietitian, today because…
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     My food and nutrition-related goals are…
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     My overall, health goals are…
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     If I could change three things about my health and nutritional habits, they would be…
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     The biggest challenge(s) to reaching my nutrition goals is/are:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     In the past, I have tried the following techniques, diets, behaviors, etc. to reach my nutrition goals…
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Submit"> &nbsp;
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

<!--==============G.  Lifestyle/Habits ======================================================================================================================================================================================   -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Lifestyle/Habits
                                </h4>
                                <span class="pull-right">
                                </span>
                            </div>
                            <div class="panel-body">
                                  @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('consultation.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Physical Activity:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                    Alcohol
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        
                                                        <input type="radio" id="contactChoice1"
                                                        name="blood_type" value="yes" required >
                                                        <label for="contactChoice1">Yes</label>
                                                        &nbsp;


                                                        <input type="radio" id="contactChoice2"
                                                        name="blood_type" value="no" required>
                                                        <label for="contactChoice2">No</label>
                                                        &nbsp;
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Specify Type/Quantity/Frequency
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                    Smoking:
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        
                                                        <input type="radio" id="contactChoice1"
                                                        name="blood_type" value="yes" required >
                                                        <label for="contactChoice1">Yes</label>
                                                        &nbsp;


                                                        <input type="radio" id="contactChoice2"
                                                        name="blood_type" value="no" required>
                                                        <label for="contactChoice2">No</label>
                                                        &nbsp;
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     On average, how many hours of sleep do you get? Weekdays 
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Weekends
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Submit"> &nbsp;
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

<!--==============H.  Weight History ======================================================================================================================================================================================   -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Weight History
                                </h4>
                                <span class="pull-right">
                                </span>
                            </div>
                            <div class="panel-body">
                                  @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('consultation.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                    Would you like to be weighed today?
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        
                                                        <input type="radio" id="contactChoice1"
                                                        name="blood_type" value="yes" required >
                                                        <label for="contactChoice1">Yes</label>
                                                        &nbsp;


                                                        <input type="radio" id="contactChoice2"
                                                        name="blood_type" value="no" required>
                                                        <label for="contactChoice2">No</label>
                                                        &nbsp;
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Height:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Current Weight:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Desired Body Weight:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Highest Adult Weight:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     When?
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Weight 1 year ago
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                    Have you had any recent changes in your weight that you are concerned about?
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        
                                                        <input type="radio" id="contactChoice1"
                                                        name="blood_type" value="yes" required >
                                                        <label for="contactChoice1">Yes</label>
                                                        &nbsp;


                                                        <input type="radio" id="contactChoice2"
                                                        name="blood_type" value="no" required>
                                                        <label for="contactChoice2">No</label>
                                                        &nbsp;
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     If yes, please explain:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Submit"> &nbsp;
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

 <!--==============I. Diet History ======================================================================================================================================================================================   -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Diet History
                                </h4>
                                <span class="pull-right">
                                </span>
                            </div>
                            <div class="panel-body">
                                  @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('consultation.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                    Do you follow any special diet or have diet restrictions or limitations for any reason (health, cultural, religious or other)?
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        
                                                        <input type="radio" id="contactChoice1"
                                                        name="blood_type" value="yes" required >
                                                        <label for="contactChoice1">Yes</label>
                                                        &nbsp;


                                                        <input type="radio" id="contactChoice2"
                                                        name="blood_type" value="no" required>
                                                        <label for="contactChoice2">No</label>
                                                        &nbsp;
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Describe
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Please list any food allergies sensitivities or intolerances
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Who prepares the majority of your meals? 
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Who shops for food?   
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Where do you shop for food?   
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     What percent of the foods you eat? Whole %
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Organic %
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Convenience %
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                    Which meals do you eat regularly, check all that apply: 
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        
                                                        <input type="radio" id="contactChoice1"
                                                        name="blood_type" value="BF" required >
                                                        <label for="contactChoice1">BF</label>
                                                        &nbsp;


                                                        <input type="radio" id="contactChoice2"
                                                        name="blood_type" value="Lunch" required>
                                                        <label for="contactChoice2">Lunch</label>
                                                        &nbsp;

                                                        <input type="radio" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Dinner/Supper Snacks</label>
                                                        &nbsp;
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     The nutrition/eating habits that are most challenging for me: 
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     The nutrition/eating habits that I am most pleased with:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Beverage Intake: Please indicate the beverages you drink, and how often you drink them. Fill in the
                                                        “Daily Amount”, “Weekly Amount”, and/or “Monthly Amount”
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Food Intake: Please indicate the type of food and frequency that you eat the following:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     Food cravings
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <input class="tags_options fill_it form-control" id="activate" multiple="multiple" name="date">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                    Eating Style: Based on how you eat regular basis, please check all that apply:
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        
                                                        <input type="checkbox" id="contactChoice1"
                                                        name="blood_type" value="BF" required >
                                                        <label for="contactChoice1">Fast Eater</label>
                                                        &nbsp;


                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Lunch" required>
                                                        <label for="contactChoice2">Erratic eater</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Emotional easter (stressed, bored, sad, etc.)</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Late night-eater</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Time constraints</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Dislike "healthy" food</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Travel frequenctly</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Do not plan meal/menus</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Rely on convenience items</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Family member(s) have different</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Love to eat</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Eat too much</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Eat because i have to</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Negative relationship with food</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Struggle with eating issues</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Confused about food/nutrition</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Frequently eat fast food</label>
                                                        &nbsp;

                                                        <input type="checkbox" id="contactChoice2"
                                                        name="blood_type" value="Dinner" required>
                                                        <label for="contactChoice2">Poor snack choices</label>
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                     The food/nutrition questions that i would like to ask are:
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        <textarea name="others" class="summernote edi-css form-control required" ></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Submit"> &nbsp;
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

<!--==============J. Diet or Nutrition Counselling Prescribed/Recommended ======================================================================================================================================================================================   -->

               <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i> Diet or Nutrition Counselling Prescribed/Recommended
                                </h4>
                                <span class="pull-right">
                                   
                                </span>
                            </div>

                            

                                      <!-- form -->
                            <div class="panel-body">  
                              {{-- @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif         --}}
                                 <div class="row">
                                    <div class="col-md-12">
                                         <form id="add_users_form" method="post" action="{{route('consultation.nutrition')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

             <!---------------------------------------------- removed table here---------------------------------- -->
                          
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">a. Recommended<span class='require'> *</span></label>
                                                    <div class="col-md-7 ">
                                                        
                                                            <textarea name="food_to_eat" id="field_ucfirst"  class="summernote edi-css form-control" required></textarea>
                                                     
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" >b. Restricted or Not Advised<span class='require'> *</span></label>
                                                    <div class="col-md-7 ">
                                                        
                                                            <textarea name="food_to_reduce" id="field_ucfirst" class="summernote edi-css form-control" required></textarea>
                                                    
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">c. Other advice<span class='require'> *</span></label>
                                                    <div class="col-md-7 ">
                                                       
                                                            <textarea name="food_to_avoid" id="field_ucfirst"  class="summernote edi-css form-control" required></textarea>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group">
                                                    <label class="col-md-3 control-label">Bad nutritional att<span class='require'> *</span></label>
                                                    <div class="col-md-7 ">
                                                            <textarea name="bad_nutritional_att"  class="summernote edi-css form-control" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Medication<span class='require'> *</span></label>
                                                    <div class="col-md-7 ">
                                                            <textarea name="medication" id="field_ucfirst"  class="summernote edi-css form-control" required ></textarea>
                                                    </div>
                                                </div> -->

                                                <!-- <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Ideal weight
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        @if($consultation)
                                                        <input class="tags_options fill_it form-control" id="field_ucfirst" multiple="multiple" name="taget" value="{{$consultation->taget}}" required >
                                                        @else
                                                        <input class="tags_options fill_it form-control" id="field_ucfirst" multiple="multiple" name="taget" required >
                                                        @endif
                                                        
                                                    </div>
                                                </div> -->

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">

                                                    <div class="col-md-offset-3 col-md-9">
                                                        @if($consultation)
                                                        <input type="hidden" name="id" value = "{{$consultation->id}}">
                                                        @endif
                                                        <input type="submit" class="mahesh btn btn-primary" value="Submit"> &nbsp;
                                                        <input type="button" class="btn btn-danger" value="Cancel"> &nbsp;
                                                        <input type="reset" id="add-news-reset-editable" class="btn btn-default" value="Reset">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>    
                                      <!-- end from -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.content -->
        </aside>
        <!-- /.right-side -->

        
<script>

document.getElementById("field_ucfirst").addEventListener("keypress", function(e) {
  if(this.selectionStart == 0) {
    // uppercase first letter
    forceKeyPressUppercase(e);
  } else {
    // lowercase other letters
    forceKeyPressLowercase(e);
  }
}, false);

</script>

@endsection