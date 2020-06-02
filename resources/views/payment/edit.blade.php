@extends('multiauth::layouts.app') 
@section('content')
<aside class="right-side right-padding">
           
            <div class="container-fluid">
                <!--main content-->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-user"></i> Edit Customer
                                </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('customer.update')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">

                                                
                                              
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="usr_name">
                                                        Names
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-user-md text-primary"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="usr_name"  name="names" value="{{$customer->names}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Ages
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                            <input type="number"  id="contact" class="form-control" name="age"  value="{{$customer->age}}"/>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Sex
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-phone text-primary"></i>
                                                            </span>
                                                            <select class="form-control" name="sex" value="" id="district">
                                                            <option value="{{$customer->sex}}">{{$customer->sex}}</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Maritial Status
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                           <select class="form-control" name="maritial_Status" id="sector">
                                                            <option value ="{{$customer->maritial_Status}}">{{$customer->maritial_Status}}</option>
                                                            <option value="single">Single</option>
                                                            <option value="married">Married</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Professional
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                            <input type="text"  id="contact" class="form-control" name="professional" value="{{$customer->professional}}" />
                                                        </div>
                                                    </div>
                                                </div>


                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        District
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-phone text-primary"></i>
                                                            </span>
                                                            <select class="form-control" value="" name="district" id="district">
                                                            <option value="{{$customer->district}}">{{$customer->district}}</option>
                                                            <option value="gasabo">Gasaba</option>
                                                            <option value="kicukiro">Kicukiro</option>
                                                             <option value="nyarugenge">Nyarugenge</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Sector
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-phone text-primary"></i>
                                                            </span>
                                                            <select class="form-control" value="" name="sector" id="sector">
                                                            <option value="{{$customer->sector}}">{{$customer->sector}}</option>
                                                            <option value="kimironko">Kimironko</option>
                                                            <option value="kicukiro">Kicukiro</option>
                                                             <option value="kiyovu">kiyovu</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>


                                              
                                               <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Phone Contact
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                            <input type="number"  id="contact" class="form-control" name="phone_no" value="{{$customer->phone_no}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                

                                                
                                                
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                         <input type="hidden" name="id" value = "{{$customer->id}}">
                                                        
                                                         <button type="submit" class="btn btn-primary">Edit</button>
                                                        
                                                        <input type="reset" class="btn btn-white " value="Reset">

                                                          <a href="{{route('customer.index')}}" class="btn btn-danger ">
                                                            <i ></i>
                                                            <span class="mm-text">back</span>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
        <!-- /.right-side -->

@endsection