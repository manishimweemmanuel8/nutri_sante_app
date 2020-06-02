@extends('multiauth::layouts.app')
@section('content')

<aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Stock </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="viewUser.php">View Stock</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> View Stock
                            </h4>
                                <span class="pull-right">

                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Stock Initial</th>
                                            <th class="text-center">Entries</th>
                                            <th class="text-center">Out</th>
                                            <th class="text-center">Other out</th>
                                            <th class="text-center">Stock Final</th>
                                            <th class="text-center">P Unit</th>
                                            <th class="text-center">P Total</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->product->name}}</td>


                                            <td>{{DB::table('shop_buckups')->where('product_id',$product->product_id)->where('shop',auth('admin')->user()->shop)->value("quantity")}} </td>


                                            <td> {{DB::table('product__requests')->where('product_id',$product->product_id)->where('created_at', '>=', date('Y-m-d'). ' 00:00:00')->where('status','Received')->where('shop',auth('admin')->user()->shop)->sum("quantity")}} </td>


                                            <td> {{DB::table('nutrition')->where('product_id',$product->product_id)->where('created_at', '>=', date('Y-m-d'). ' 00:00:00')->where('status','paid')->where('shop',auth('admin')->user()->shop)->sum("quantity")}}</td>


                                            <td> {{DB::table('nutrition')->where('product_id',$product->product_id)->where('created_at', '>=', date('Y-m-d'). ' 00:00:00')->where('deleted_at',)->where('status','other')->where('shop',auth('admin')->user()->shop)->sum("quantity")}} </td>

                                            <td>{{$product->quantity}}</td>
                                            <td>{{number_format($product->product->amount)}} RWF</td>
                                            <td>{{number_format($product->product->amount * DB::table('nutrition')->where('product_id',$product->product_id)->where('created_at', '>=', date('Y-m-d'). ' 00:00:00')->where('status','paid')->where('shop',auth('admin')->user()->shop)->sum("quantity"))}} RWF</td>
                                           
                                        <!--     <td>
                                                <a class="btn btn-primary" href="javascript:;">
                                                    <i class="fa fa-fw fa-edit"></i> Review One Product
                                                </a>
                                            </td> -->

                                            <p hidden>{{$total+=$product->product->amount * DB::table('nutrition')->where('product_id',$product->product_id)->where('created_at', '>=', date('Y-m-d'). ' 00:00:00')->where('status','paid')->where('shop',auth('admin')->user()->shop)->sum("quantity")}}</p>

                                        </tr>
                                        @endforeach
                                         </tbody>

                                          <tr>
                                                <td  ><h4><strong>VENTE: </strong></h4></td>
                                                <td colspan="6">   </td>
                                                <td class="col-md-3 text-center  text-danger"><h4><strong>{{number_format($total)}} rwf</strong></h4></td>
                                            </tr>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        @endsection