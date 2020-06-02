@extends('multiauth::layouts.app')
@section('content')

 <aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Productions</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Productions</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Production List
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
                                            <th class="text-center">Names</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($productions as $production)

                        
                                        <tr>
                                            
                                            <td>{{ $production->created_at }}</td>
                                            
                                          
                                            <td>{{DB::table('products')->where('id',$production->after_production_id)->value('name')}}</td>
                                         


                                            <td>
                                               {{$production->quantity}}

                                            </td>

                                            <td>
                                               {{$production->stock}}

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
        </aside>

@endsection