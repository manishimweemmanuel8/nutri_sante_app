@extends('multiauth::layouts.app')
@section('content')

<aside class="right-side right-padding">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                           
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <i  aria-hidden="true"></i>   <i class="fa fa-newspaper-o" aria-hidden="true"></i> Consultations
                            </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                            </div>
                           

                            
                            <div class="panel-body table-responsive">
                                 @include('multiauth::message')
                                <table class="table table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">BMI</th>
                                            <th class="text-center">Waist Circumference</th>
                                            <th class="text-center">Observation</th>
                                            <th class="text-center">Blood type</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                            @foreach ($consultations as $consultation)

                        
                                        <tr>
                                            <td>{{ $consultation->created_at }}</td>
                                            
                                            <td>{{ $consultation->customer->names }}</td>
                                            <td>
                                               {{ $consultation->bmi }}

                                            </td>
                                            <td> {{ $consultation->waist_circumference }}
                                        </td>
                                            <td>
                                               {{ $consultation->observation }}
                                            </td>
                                            <td>
                                               {{ $consultation->blood_type }}
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