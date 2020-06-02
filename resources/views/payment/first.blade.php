@extends('multiauth::layouts.app') 
@section('content')

<aside class="right-side right-padding">

    <section class="content-header">
                <!--section starts-->
                <h2>First Time</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">first time</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Customer who come first time
                            </h4>
                                <span class="pull-right">
                                
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                 @include('multiauth::message')
            
           
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
                                                {{number_format($total) }} rwf
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