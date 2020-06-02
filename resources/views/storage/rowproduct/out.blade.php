@extends('multiauth::layouts.app') 
@section('content')
    <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Row Material Out</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Product</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Row Material List
                            </h4>
                                <span class="pull-right">
                                
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                 @include('multiauth::message')
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Supply Name</th>
                                            <th class="text-center">Supply Phone</th>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Initial Quantity</th>
                                             <th class="text-center">Remain Quantity</th>

                                              <th class="text-center">Amount</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                        @foreach($rowProducts as $rowProduct)
                        
                                        <tr>
                                            <td>{{$rowProduct->created_at}}</td>
                                            
                                            <td>{{$rowProduct->supply_name}}</td>
                                            <td>{{$rowProduct->supply_phone}}</td>
                                              <td>{{$rowProduct->product->name}}</td>
                                               <td>{{number_format($rowProduct->quantity + DB::table('preparations')->where('row_product_id',$rowProduct->id)->value("quantity"))}} {{$rowProduct->category}}</td>
                                              <td>{{number_format($rowProduct->quantity)}} {{$rowProduct->category}}</td>
                                              <td>{{number_format($rowProduct->amount)}} RWF</td>
                                            
                                          
                                           
                                            <td>
                                                <a class=" btn btn-primary" href="{{route('preparation.create',['id'=>$rowProduct->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> Out
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col-md-6 -->
                <!--row -->
                <!--row ends-->
            </div>
            <!-- /.content -->
        </aside>
        <!-- /.right-side -->

           <script type="text/javascript">
    function confirmation() {
      return confirm('Are you sure you want to do this?');
    }
</script>

@endsection