@extends('multiauth::layouts.app')
@section('content')

 <aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Consultation</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">View Consultation </a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> View Consultation list
                            </h4>
                                <span class="pull-right">
                                  
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Names</th>
                                            <th class="text-center">Sex</th>
                                            <th class="text-center">Marital</th>
                                            <th class="text-center">Occupation</th>
                                            <th class="text-center">Country</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($customers as $customer)

                        
                                        <tr>
                                            <td>{{ $customer->created_at }}</td>
                                            
                                            <td>{{ $customer->names }}</td>
                                            <td>
                                               {{ $customer->sex }}

                                            </td>
                                             <td>
                                               {{ $customer->maritial_Status }}

                                            </td>

                                             <td>
                                               {{ $customer->occupation }}

                                            </td>
                                              @if(is_null($customer->country))
                                             <td>
                                               {{DB::table('sectors')->where('id',$customer->sector_id)->value('name')}}

                                            </td>
                                            @else
                                             <td>
                                               {{ $customer->country }}

                                            </td>
                                            @endif
                                            
                                            <td>
                                                 <a class=" btn btn-success" href="{{route('history.report',['customer_id'=>$customer->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> History
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
        </aside>

@endsection