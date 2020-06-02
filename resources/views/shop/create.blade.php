 
@extends('multiauth::layouts.app')
@section('content')

  <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Add Consultation results</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Consultation results</a>
                    </li>
                </ol>
            </section>
            <!--section ends-->
            <div class="container-fluid">
                <!--main content-->
                
                <div class="container" >
                        <div class="row">
                            <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <address>
                                            <strong>Nutri-sante</strong>
                                            <br>
                                            Kigali
                                            <br>
                                            Kicukiro, KG 9435 L
                                            <br>
                                            <abbr title="Phone">P:</abbr> 0788888888
                                        </address>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                        <p>
                                            <em>Date: {{date("F d, Y h:i:s A")}}</em>
                                        </p>
                                        <p>
                                            <em>Receipt #: 34522677W</em>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center">
                                        <h1>Receipt</h1>
                                    </div>
                                    </span>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>#</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($products as $product)
                                            <tr>
                                                <td class="col-md-7"><em>{{$product->product->name}}</em></h4></td>
                                                <td class="col-md-1" style="text-align: center"> {{$product->quantity}} </td>
                                                <td class="col-md-1 text-center">{{number_format($product->product->amount)}} rwf</td>
                                                <td class="col-md-3 text-center">{{number_format($product->product->amount * $product->quantity)}} rwf</td>
                                            </tr>

                                            <p hidden>{{$total+=$product->product->amount * $product->quantity}}</p>

                                            
                                            
                                            @endforeach
                                            <tr>
                                                <td class="col-md-2">   </td>
                                                <td class="col-md-2">   </td>
                                                <td class="col-md-7 text-right"><h4><strong>Total: </strong></h4></td>
                                                <td class="col-md-3 text-center  text-danger"><h4><strong>{{number_format($total)}} rwf</strong></h4></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <form  method="post" action="{{route('shop.payment')}}" class="form-horizontal">
                                           {{ csrf_field() }}
                                            <div class="form-body" hidden>
                                               
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        cunsultation_id
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="number" class="form-control" id="usr_name"  name="id" value="{{$id}}">
                                                    </div>
                                                </div>

                                                 
                                            </div>
                                   
                                         <input type="submit" class="btn btn-success btn-lg btn-block" value="Print">
                                    
                                    
                                </div>
                            </div>
                        </div>

            </div>
            <!-- /.content -->
        </aside>

@endsection