@extends('multiauth::layouts.app')
@section('content')

<aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Stock</h2>
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
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        @foreach($productions as $production)
                                        <tr>
                                             <td>{{DB::table('products')->where('id',$production->after_production_id)->value('name')}}</td>


                                            <td>{{DB::table('stock_buckups')->where('after_production_id',$production->after_production_id)->value("quantity")}} </td>


                                            <td>{{DB::table('delivers')->where('product_id',$production->after_production_id)->where('created_at', '>=', date('Y-m-d'). ' 00:00:00')->where('status','In')->sum("quantity")}}  </td>


                                            <td>{{DB::table('delivers')->where('product_id',$production->after_production_id)->where('created_at', '>=', date('Y-m-d'). ' 00:00:00')->where('status','deliver')->sum("quantity")}}  </td>


                                            <td>{{DB::table('delivers')->where('product_id',$production->after_production_id)->where('created_at', '>=', date('Y-m-d'). ' 00:00:00')->where('status','null')->sum("quantity")}}  </td>

                                            <td>{{$production->quantity}} </td>
                                          
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