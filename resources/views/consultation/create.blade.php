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
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Save Consultation results
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

                           

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Associated Diseases
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input class="tags_options fill_it form-control" id="field_ucfirst" multiple="multiple" name="associated_deseases" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <label class="col-md-3 control-label">
                                                        Reason 
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7 ">
                                                        
                                                            <textarea name="reason" class="summernote edi-css form-control required" ></textarea>
                                                        
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

               <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i> Record Nutrition
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

                                               
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Weight</th>
                                            <th class="text-center">Height</th>
                                            <th class="text-center">BMI</th>
                                            <th class="text-center">BMI Category</th>
                                            <!-- <th class="text-center">Delete/Cancel</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @if($consultation)

                                         @if($consultation->bmi < 18.5)
                                        <tr>
                                            <td bgcolor="yellow">{{$consultation->customer->names}}</td>
                                            <td bgcolor="yellow">{{$consultation->weight}} kg</td>
                                            <td bgcolor="yellow">{{$consultation->height}} m</td>
                                            <td bgcolor="yellow">{{number_format((float)$consultation->bmi, 1, '.', '')}} </td>
                                            <td bgcolor="yellow">Underweight</td>
                                            
                                      
                                        </tr>
                                        @elseif($consultation->bmi >= 18.5 && $consultation->bmi <= 24.9 )
                                          <tr>
                                            <td bgcolor="green">{{$consultation->customer->names}}</td>
                                            <td bgcolor="green">{{$consultation->weight}} kg</td>
                                            <td bgcolor="green">{{$consultation->height}} m</td>
                                            <td bgcolor="green">{{number_format((float)$consultation->bmi, 1, '.', '')}} </td>
                                            <td bgcolor="green">Ideal BMI</td>
                                            
                                      
                                        </tr>
                                        @elseif($consultation->bmi >= 25 && $consultation->bmi <= 29.9 )
                                          <tr>
                                            <td bgcolor="orange">{{$consultation->customer->names}}</td>
                                            <td bgcolor="orange">{{$consultation->weight}} kg</td>
                                            <td bgcolor="orange">{{$consultation->height}} m</td>
                                            <td bgcolor="orange">{{number_format((float)$consultation->bmi, 1, '.', '')}} </td>
                                            <td bgcolor="orange"> Overweight</td>
                                            
                                      
                                        </tr>
                                        @elseif($consultation->bmi >= 30 && $consultation->bmi <= 34.9 )
                                          <tr>
                                            <td bgcolor="red">{{$consultation->customer->names}}</td>
                                            <td bgcolor="red">{{$consultation->weight}} kg</td>
                                            <td bgcolor="red">{{$consultation->height}} m</td>
                                            <td bgcolor="red">{{number_format((float)$consultation->bmi, 1, '.', '')}} </td>
                                            <td bgcolor="red"> Obese</td>
                                            
                                      
                                        </tr>

                                        @elseif($consultation->bmi >= 35 && $consultation->bmi <= 39.9 )
                                          <tr>
                                            <td bgcolor="red">{{$consultation->customer->names}}</td>
                                            <td bgcolor="red">{{$consultation->weight}} kg</td>
                                            <td bgcolor="red">{{$consultation->height}} m</td>
                                            <td bgcolor="red">{{number_format((float)$consultation->bmi, 1, '.', '')}} </td>
                                            <td bgcolor="red">Serverely</td>
                                            
                                      
                                        </tr>

                                        @else

                                          <tr>
                                            <td>{{$consultation->customer->names}}</td>
                                            <td>{{$consultation->weight}} kg</td>
                                            <td>{{$consultation->height}} m</td>
                                            <td>{{number_format((float)$consultation->bmi, 1, '.', '')}} </td>
                                            <td>Morbidly Obese</td>
                                            
                                      
                                        </tr>
                                        @endif
                                        
                                       @else
                                       <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                      
                                        </tr>
                                        @endif


                                        
                                    </tbody>
                                </table>
                          
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Food to eat<span class='require'> *</span></label>
                                                    <div class="col-md-7 ">
                                                        
                                                            <textarea name="food_to_eat" id="field_ucfirst"  class="summernote edi-css form-control" required></textarea>
                                                     
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" >Food to reduce<span class='require'> *</span></label>
                                                    <div class="col-md-7 ">
                                                        
                                                            <textarea name="food_to_reduce" id="field_ucfirst" class="summernote edi-css form-control" required></textarea>
                                                    
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Food to avoid<span class='require'> *</span></label>
                                                    <div class="col-md-7 ">
                                                       
                                                            <textarea name="food_to_avoid" id="field_ucfirst"  class="summernote edi-css form-control" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
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
                                                </div>

                                                <div class="form-group">
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
                                                </div>

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