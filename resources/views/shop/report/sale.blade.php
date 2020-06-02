@extends('multiauth::layouts.app')
@section('content')

 <aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Sales Products</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Products</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Sale List
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
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">P.Unit</th>
                                            <th class="text-center">P.total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($sales as $sale)

                        
                                        <tr>
                                             <td>{{$sale->created_at}}</td>
                                              <td>{{$sale->customer_name}}</td>
                                            <td>{{$sale->customer_phone}}</td>
                                            <td>{{$sale->product->name}}</td>
                                            <td>{{$sale->quantity}}</td>
                                             <td>{{number_format($sale->product->amount)}} RWF</td>
                                            <td>{{number_format($sale->product->amount * $sale->quantity)}} RWF</td>
                                          
                                           
                                     
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