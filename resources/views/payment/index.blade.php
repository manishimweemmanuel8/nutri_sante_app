@extends('multiauth::layouts.app')
@section('content')

<aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Customer Payment</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Payment</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Customer payment
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
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">Receptionist</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Delete/Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          @foreach ($payments as $payment)

                        
                                        <tr>
                                            <td>{{ $payment->created_at }}</td>
                                            
                                            <td>{{ $payment->customer->names }}</td>
                                            <td>
                                               {{ $payment->user_id }}

                                            </td>
                                            <td> {{ $payment->amount }}
                                        </td>
                                            
                                             
                                            <td>
                                                <a class=" btn btn-danger" href="{{route('payment.destroy',['id'=>$payment->id])}}"  onclick="return confirmation();">
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
        </aside>

                <script type="text/javascript">
    function confirmation() {
      return confirm('Are you sure you want to do this?');
    }
</script>

@endsection