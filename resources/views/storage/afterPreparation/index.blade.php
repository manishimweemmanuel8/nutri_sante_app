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
                                            <th class="text-center">Employee Name</th>
                                            <th class="text-center">Product</th>
                                             <th class="text-center">Initial Quantity</th>
                                             <th class="text-center">final Quantity</th>
                                             <th class="text-center">missing Quantity</th>
                                           <th class="text-center">Production Quantity</th>
                                            <th class="text-center">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                        @foreach($afterPreparations as $afterPreparation)
                        
                                        <tr>
                                            <td>{{$afterPreparation->created_at}}</td>
                                            
                                            <td>{{$afterPreparation->employee_name}}</td>
                                              <td>{{$afterPreparation->preparation->rowProduct->product->name}}</td>
                                               <td>{{number_format($afterPreparation->preparation->quantity)}} {{$afterPreparation->preparation->rowProduct->category}}</td>
                                              <td>{{number_format($afterPreparation->quantity)}} {{$afterPreparation->preparation->rowProduct->category}}</td>
                                               <td>{{number_format($afterPreparation->missing )}} {{$afterPreparation->preparation->rowProduct->category}}</td>
                                           
                                               <td>{{number_format(DB::table('productions')->where('after_preparation_id',$afterPreparation->id)->sum("quantity"))}} {{$afterPreparation->preparation->rowProduct->category}} </td>
                                              <td>
                                                <a class=" btn btn-primary" href="{{route('production.create',['id'=>$afterPreparation->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> Production
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