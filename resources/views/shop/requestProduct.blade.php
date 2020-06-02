@extends('multiauth::layouts.app') 
@section('content')
  <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Request Product</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Request Product</a>
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
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i> Add Product
                                </h4>
                                <span class="pull-right">
                              
                                </span>
                            </div>


                                <form id="add_users_form" method="post" action="{{route('productRequest.store')}}" class="form-horizontal" style="margin-top:3rem">
                                     {{ csrf_field() }}

                                        <div class="form-body">
                                     
                                            <div class="form-group">
                                                    <label class="col-md-2 control-label" for="categry">
                                                        Product
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-5">
                                                        <select class="form-control" name="product_id" id="district">
                                                            <option value>Select Product</option>
                                                            @foreach($products as $product)
                                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <input type="text" class=" fill_it form-control" id="activate" multiple="multiple" placeholder="Quantity" name="quantity"/>
                                                       
                                                    </div>

                                                    <div class="col-md-3">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Add"> &nbsp;
                                                    </div>
                                            </div> 
                                        </div>             
                                </form>


                            <div class="panel-body">
                                <table class="table table-bordered text-center" id="fitness-table" >
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

                                                @if($shopRequest->status== 'Pending')
                                               <a class=" btn btn-danger" href="{{route('productRequest.destroy',['id'=>$shopRequest->id])}}">
                                                    <i class="fa fa-trash-o"></i> Remove
                                                </a>
                                                @elseif($shopRequest->status=='Approved')

                                                <a class=" btn btn-primary" href="">
                                                    <i class="fa fa-"></i> wait to conforn
                                                </a>
                                                 @elseif($shopRequest->status=='Deliver')
                                                  <a class=" btn btn-primary" href="{{route('shop.received',['id'=>$shopRequest->id])}} ">
                                                    <i class="fa fa"></i> Received
                                                </a>

                                                @else
                                                 <a class=" btn btn-success" href="">
                                                    <i class="fa fa-"></i> process end successful
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