@extends('multiauth::layouts.app')
@section('content')

 <aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Requests</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="viewUser.php">View Product requests</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> View Product requests
                            </h4>
                                <span class="pull-right">
                                   
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                 @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                    
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Names</th>
                                            <th class="text-center">Shop</th>
                                           
                                            <th class="text-center">Action</th>
                                            <!-- <th class="text-center">Delete/Cancel</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($shopRequests as $shopRequest)
                                        <tr>
                                            <td>{{$shopRequest->shop_user}}</td>
                                            <td>{{$shopRequest->shop}}</td>
                                           
                                            <td>
                                                  <a class=" btn btn-primary" href="{{route('shopRequest.view',['shop'=>$shopRequest->shop])}}">
                                                    <i class="fa fa-fw fa-edit"></i> View Products
                                                </a>
                                            </td>
                                            <!-- <td>
                                                <a class="delete btn btn-danger" href="javascript:;">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </a>
                                            </td> -->
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