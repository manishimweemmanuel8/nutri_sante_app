@extends('multiauth::layouts.app')
@section('content')
 <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>View products requested</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Product request</a>
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
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i> Products
                                </h4>
                                <span class="pull-right">
                                    
                                </span>
                            </div>


                                <form id="add_news_form" method="post" class="form-horizontal" style="margin-top:3rem">
                                        <div class="form-body">
                      
                                                  <!--   <div  style="float:right; margin: 0 1em 1em 0">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Approove all"> &nbsp;
                                                    </div> -->
                                        </div>             
                                </form>

                                


                            <div class="panel-body">
                                 @if(session()->has('message'))
                                <div class="alert alert-success">
                                {{ session()->get('message') }}
                                </div>
                                    @endif
                                <table class="table table-bordered text-center" >
                                    <thead>
                                        <tr>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Quantity (piece)</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($shopRequests as $shopRequest)
                                        <tr>
                                            <td>{{$shopRequest->product->name}}</td>
                                            <td>{{$shopRequest->quantity}} (pieces)</td>
                                            <td>{{$shopRequest->status}}</td>
                                            <td>
                                                @if($shopRequest->status=='Pending')
                                                <a class=" btn btn-success" href="{{route('storage.approved',['id'=>$shopRequest->id])}}">
                                                    <i class="fa fa-"></i> Approve
                                                </a>
                                                @elseif($shopRequest->status=='Approved')
                                                <a class=" btn btn-success" href="{{route('storage.deliver',['id'=>$shopRequest->id])}}">
                                                    <i class="fa fa-"></i> Deliver
                                                </a>
                                                @elseif($shopRequest->status=='Received')
                                                 <a class=" btn btn-success" href="">
                                                    <i class="fa fa-"></i> Process end successful
                                                </a>
                                                @endif
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
            <!-- /.content -->
        </aside>
        <!-- /.right-side -->

        @endsection