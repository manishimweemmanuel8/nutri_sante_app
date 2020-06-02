@extends('multiauth::layouts.app') 
@section('content')
    <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Production</h2>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Production List
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
                                             <th class="text-center">Quantity</th>
                                            <th class="text-center">Supply Name</th>
                                            <th class="text-center">Supply Phone</th>
                                            <th class="text-center">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                        @foreach($productions as $production)
                        
                                        <tr>
                                            <td>{{$production->created_at}}</td>
                                            
                                            <td>{{$production->employee_name}}</td>
                                              <td>{{$production->afterPreparation->preparation->rowProduct->product->name}}</td>
                                              <td>{{number_format($production->quantity)}} {{$production->afterPreparation->preparation->rowProduct->category}}</td>
                                            
                                              <td>{{$production->afterPreparation->preparation->rowProduct->supply_name}}</td>
                                              <td>{{$production->afterPreparation->preparation->rowProduct->supply_phone}}</td>

                                              @if(DB::table('after_productions')->where('production_id',$production->id)->count())
                                              <td></td>
                                              @else

                                              <td>
                                                <a class=" btn btn-primary" href="{{route('after.production.create',['id'=>$production->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> After Production
                                                </a>
                                            </td>
                                            @endif

                                            
                                          
                                           
                                            
                                            
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