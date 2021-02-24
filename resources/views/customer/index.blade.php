@extends('multiauth::layouts.app')
@section('content')

 <aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Customers</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Customer</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Customer List
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
                                            <th class="text-center">Sex</th>
                                            <th class="text-center">Marital</th>
                                            {{-- <th class="text-center">Occupation</th> --}}
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Country</th>
                                            <th class="text-center">Destrict</th>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Edit/Save</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($customers as $customer)

                        
                                        <tr>
                                            <td>{{ $customer->created_at }}</td>
                                            
                                            <td>{{ $customer->names }}</td>
                                            <td>
                                               {{ $customer->sex }}

                                            </td>
                                            <td> {{ $customer->maritial_Status }}
                                        </td>
                                          
                                            <td>
                                               {{ $customer->phone_no }}
                                            </td>
                                            <td>
                                               {{ $customer->country }}
                                            </td>

                                           @if($customer->country == 'rwanda')
                                             <td>
                                               {{DB::table('districts')->where('id',$customer->district_id)->value('name')}}

                                            </td>
                                            @else
                                             <td>
                                                -

                                            </td>
                                            @endif
                                          
                                            <td>
                                                <a class=" btn btn-success" href="{{route('payment.create',['id'=>$customer->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> Customer reception
                                                </a>
                                            </td>
                                            <td>
                                                <a class=" btn btn-primary" href="{{route('customer.edit',['id'=>$customer->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
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

        <script type="text/javascript">
    function confirmation() {
      return confirm('Are you sure you want to do this?');
    }
</script>


@endsection