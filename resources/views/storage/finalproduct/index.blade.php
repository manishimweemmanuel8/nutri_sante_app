@extends('multiauth::layouts.app') 
@section('content')
    <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Final Product</h2>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Products List
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
                                             <th class="text-center">Quantity</th>
                                              <th class="text-center">Amount</th>
                                            <th class="text-center">Edit/Save</th>
                                            <th class="text-center">Delete/Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                        @foreach($finalProducts as $finalProduct)
                        
                                        <tr>
                                            <td>{{$finalProduct->created_at}}</td>
                                            
                                            <td>{{$finalProduct->supply_name}}</td>
                                            <td>{{$finalProduct->supply_phone}}</td>
                                              <td>{{$finalProduct->product->name}}</td>
                                              <td>{{number_format($finalProduct->quantity)}} {{$finalProduct->category}}</td>
                                              <td>{{number_format($finalProduct->amount)}} RWF</td>
                                            
                                          
                                           
                                            <td>
                                                <a class=" btn btn-primary" href="{{route('finalProduct.edit',['id'=>$finalProduct->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a class=" btn btn-danger" href="{{route('finalProduct.destroy',['id'=>$finalProduct->id])}}" onclick="return confirmation()">
                                                    <i class="fa fa-trash-o"></i> Delete
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