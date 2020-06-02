@extends('multiauth::layouts.app') 
@section('content')

<aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Consultation receipt</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Consultation receipt</a>
                    </li>
                
                </ol>
            </section>
            <div class="container-fluid">

            
                <!-- <div class="row">
                    <div class="col-lg-12"> -->
                        <!-- Basic charts strats here-->
                        
                    <div class="container " >
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
                                            <tr>
                                                <td class="col-md-9"><h4><em>Consultation</em></h4></td>
                                                <td class="col-md-1" style="text-align: center"> {{$count+=1}} </td>
                                                <td class="col-md-1 text-center">{{number_format($amount)}}rwf</td>
                                                <td class="col-md-1 text-center">{{number_format($amount)}}rwf</td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td class="text-right" hidden=""> same thing  </td>
                                                <td class="text-right" hidden=""> same thing  </td>
                                                <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                                <td class="text-center text-danger"><h4><strong>{{number_format($amount)}}rwf</strong></h4></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                     <form  method="post" action="{{route('payment.store')}}" class="form-horizontal">
                                           {{ csrf_field() }}
                                            <div class="form-body" hidden>
                                               
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        customer_id
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="number" class="form-control" id="usr_name"  name="customer_id" value="{{$id}}">
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        amount
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="number" class="form-control" id="usr_name"  name="amount" value="{{$amount}}">
                                                    </div>
                                                </div>
                                            </div>
                                   
                                         <input type="submit" class="btn btn-success btn-lg btn-block" value="Print">
                                    

                                </form>
                                </div>
                            </div>
                        </div>
                    <!-- </div>
                </div> -->
            </div>
        </div>

        </aside>

@endsection