@extends('multiauth::layouts.app')
@section('content')

 <aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Consultation</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">View Consultation </a>
                    </li>
                
                </ol>
            </section>
            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-file-text-o"></i> Summary From 
                                </h4>
                                <span class="pull-right">
                                   
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="courseschedule_form" method="post" action="{{route('report.between')}}" class="form-horizontal">
                                                            {{ csrf_field() }}

                 
                                            <div class="form-body">
                                                
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="from">
                                                        From
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-3">
                                                        <div class='input-group date' id='datetimepicker4'>
                                                            <input type='date' class="form-control" name="from" id="from" />
                                                          
                                                        </div>
                                                    </div>
                                                    <label class="col-md-1 control-label" for="to">
                                                        To
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-3">
                                                        <div class='input-group date' id='datetimepicker5'>
                                                            <input type='date' class="form-control" name="to" id="to" />
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                               
                                              
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-7">
                                                        <input type="submit" class="btn btn-primary" value="Search"> &nbsp;
                                                        <input type="reset" class="btn btn-white add-news-reset-editable" value="Reset">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> View Consultation list
                            </h4>
                                <span class="pull-right">
                                  
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Names</th>
                                            <th class="text-center">Sex</th>
                                            <th class="text-center">Marital</th>
                                            <th class="text-center">Occupation</th>
                                            <th class="text-center">Cell</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($consultations as $consultation)

                        
                                        <tr>
                                            <td>{{ $consultation->created_at }}</td>
                                            
                                            <td>{{ $consultation->customer->names }}</td>
                                            <td>
                                               {{ $consultation->customer->sex }}

                                            </td>
                                             <td>
                                               {{ $consultation->customer->maritial_Status }}

                                            </td>

                                             <td>
                                               {{ $consultation->customer->occupation }}

                                            </td>
                                             @if(is_null($consultation->customer->country))
                                             <td>
                                               {{DB::table('sectors')->where('id',$consultation->customer->sector_id)->value('name')}}

                                            </td>
                                            @else
                                             <td>
                                               {{ $consultation->customer->country }}

                                            </td>
                                            @endif
                                            
                                            <td>
                                                 <a class=" btn btn-success" href="{{route('more.info',['id'=>$consultation->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> History
                                                </a>
                                            </td>
                                        </tr>
                                         @endforeach 
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

@endsection