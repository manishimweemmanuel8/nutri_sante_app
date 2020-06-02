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
                                    <i class="fa fa-fw fa-user"></i> Edit Consultation
                                </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="add_users_form" method="post" action="{{route('consultation.update')}}" class="form-horizontal">
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
                                                            <input type="text" class="form-control" id="usr_name"  name="names" value="{{$consultation->customer->names}}" >
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
                                                            <input type="text" class="form-control" id="usr_name"  name="customer_id" value="{{$consultation->customer_id}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        BMI
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-phone text-primary"></i>
                                                            </span>
                                                            <input type="decimal"  id="contact" class="form-control" name="bmi" value="{{$consultation->bmi}}" />
                                                        
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                         Weight
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                           <input type="decimal"  id="contact" class="form-control" name="weight" value="{{$consultation->weight}}" />                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Height
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                            <input type="decimal"  id="contact" class="form-control" name="height" value="{{$consultation->height}}" />
                                                        </div>
                                                    </div>
                                                </div>


                                                  

                                              
                                               <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Waist Circumference
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                            <input type="number"  id="contact" class="form-control" name="waist_circumference" value="{{$consultation->waist_circumference}}" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Observation
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                            <textarea type="text"  id="contact" class="form-control" name="observation" value="{{$consultation->observation}}" >{{$consultation->observation}} </textarea>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Medical conditions
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                            <input type="text"  id="contact" class="form-control" name="medical_conditions" value="{{$consultation->medical_conditions}}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label" for="contact">
                                                        Blood Type
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-numnber text-primary"></i>
                                                            </span>
                                                           <select class="form-control" name="blood_type" id="sector">
                                                            <option value="{{$consultation->blood_type}}">{{$consultation->blood_type}}</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                

                                                
                                                
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        
                                                          <input type="hidden" name="id" value = "{{$consultation->id}}">
                                                        
                                                         <button type="submit" class="btn btn-primary">Edit</button>
                                                        
                                                        <input type="reset" class="btn btn-white " value="Reset">

                                                          <a href="{{route('consultation.index')}}" class="btn btn-danger ">
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