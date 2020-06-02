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
                                   @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <table class="table table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">BMI</th>
                                            <th class="text-center">Waist Circumference</th>
                                            <th class="text-center">Observation</th>
                                            <th class="text-center">Blood type</th>
                                            <th class="text-center">Edit/Save</th>
                                            <th class="text-center">Delete/Cancel</th>
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
                                             <td>
                                                <a class="edit btn btn-primary" href="{{route('consultation.edit',['id'=>$consultation->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a class="delete btn btn-danger" href="{{route('consultation.destroy',['id'=>$consultation->id])}}">
                                                    <i class="fa fa-trash-o"></i> Delete
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