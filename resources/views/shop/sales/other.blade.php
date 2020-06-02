@extends('multiauth::layouts.app')
@section('content')

 <aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Products</h2>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Product List
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
                                            <th class="text-center">Names</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Comment</th>
                                            <th class="text-center">P.Unit</th>
                                            <th class="text-center">P.total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($others as $other)

                        
                                        <tr>
                                            <td>{{$other->product->name}}</td>
                                            <td>{{$other->quantity}}</td>
                                            <td>{{$other->comment}}</td>
                                             <td>{{number_format($other->product->amount)}} RWF</td>
                                            <td>{{number_format($other->product->amount * $other->quantity)}} RWF</td>
                                          
                                           
                                          
                                        <!--     <td>
                                                <a class=" btn btn-danger" href="{{route('other.destroy',['id'=>$other->id])}}">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </a>
                                            </td> -->
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