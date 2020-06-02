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
                                         <!--    <th class="text-center">Edit/Save</th>
                                            <th class="text-center">Delete/Cancel</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($damages as $damage)

                        
                                        <tr>
                                            <td>{{$damage->product->name}}</td>
                                            <td>{{$damage->quantity}}</td>
                                            <td>{{$damage->comment}}</td>
                                          
                                           <!-- 
                                            <td>
                                                <a class=" btn btn-primary" href="{{route('damage.edit',['id'=>$damage->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a class=" btn btn-danger" href="{{route('damage.destroy',['id'=>$damage->id])}}">
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