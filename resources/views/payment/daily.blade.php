@extends('multiauth::layouts.app') 
@section('content')

<aside class="right-side right-padding">

    <section class="content-header">
                <!--section starts-->
                <h2>Daily Report</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Rport</a>
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
                                    @if(session()->has('message'))
                                    <div class="alert alert-danger">
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
                                        <form id="courseschedule_form" method="post" action="{{route('report.between.receptionist')}}" class="form-horizontal">
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Daily Reports
                            </h4>
                                <span class="pull-right">
                                
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                 {{-- @include('multiauth::message') --}}
            
           
                                <table class="table table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">Receptionist</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                            @foreach ($payments as $payment)

                        
                                        <tr>
                                            <td>{{ $payment->created_at }}</td>
                                            
                                            <td>{{ $payment->customer->names }}</td>
                                            <td>
                                               {{ $payment->user_id }} 

                                            </td>
                                            <td> {{ number_format($payment->amount) }} rwf
                                        </td>
                                            
                                             
                                           
                                        </tr>
                                        <p hidden> {{$total+= $payment->amount}}</p>

                                         @endforeach 

                                         <tr>
                                            <td>Total</td>
                                            
                                            <td></td>
                                            <td>
                                              

                                            </td>
                                            <td> 
                                                {{number_format($total)}} Rwf
                                        </td>
                                            
                                             
                                           
                                        </tr>
                                       
                                        
                                    </tbody>
                                </table>

                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>


@endsection