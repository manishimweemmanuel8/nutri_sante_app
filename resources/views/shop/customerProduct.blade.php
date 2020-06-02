 
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> View Consultation list
                            </h4>
                                <span class="pull-right">
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Consultation Date</th>
                                            <th class="text-center">Names</th>
                                            <th class="text-center">Sex</th>
                                            <th class="text-center">Marital</th>
                                            <th class="text-center">Occupation</th>
                                            <th class="text-center">Cell</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($consultates as $consultate)
                                        <tr>
                                           <td>{{ $consultate->created_at }}</td>
                                            <td>{{ $consultate->customer->names }}</td>
                                            <td> {{ $consultate->customer->sex }}</td>
                                             <td> {{ $consultate->customer->maritial_Status }}</td>
                                              <td>{{ $consultate->customer->occupation }} </td>
                                             <td>{{ $consultate->customer->cell->name }} </td>
                                            <td>
                                                <a class=" btn btn-primary" href="{{route('shop.create',['id'=>$consultate->id])}}">
                                                    <i class="fa fa-trash-o"></i> Continue
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