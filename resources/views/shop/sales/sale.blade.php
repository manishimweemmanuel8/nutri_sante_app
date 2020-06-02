@extends('multiauth::layouts.app')
@section('content')

 <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Sale</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Sale product</a>
                    </li>
                </ol>
            </section>
            <!--section ends-->
            <!--section ends-->
            <div class="container-fluid">
                            <!--main content-->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel">
                            <div class="panel-heading bg-primary">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-user"></i> Sell product
                                </h4>
                                <span class="pull-right">
                                   
                                </span>
                            </div>


                                <!-- tab forms -->
                                <!-- <div class="container"> -->
                                    <!-- <div class="page-header">
                                        <h4> Sell product<span class="pull-right label label-default">:)</span></h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"> -->
                                            <div class="panel with-nav-tabs panel-default">
                                                <div class="panel-heading">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#tab1default" data-toggle="tab">Sell Product</a></li>
                                                            <li><a href="#tab2default" data-toggle="tab">Other outlet product</a></li>
                                                        </ul>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="tab1default">
                                                            <!-- <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12"> -->
                                                <form id="add_news_form" method="post"  action="{{route('sale.store')}}" class="form-horizontal">

                                                     {{ csrf_field() }}
                                                                            <div class="form-body">

                                                                                <div class="form-group" hidden>
                                                    <label class="col-md-3 control-label" for="usr_name">
                                                        Id
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-user-md text-primary"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="usr_name"  name="id" value="{{$id}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                                                
                                                                               <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                        Product

                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <select class="form-control" name="product_id" id="district">

                                                            <option value>Select product</option>
                                                            @foreach($products as $product)
                                                            <option value="{{$product->product_id}}">{{$product->product->name}}</option>
                                                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Quantity
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input type="decimal"  id="contact" class="form-control" name="quantity"  />
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Customer Name
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input type="text"  id="contact" class="form-control" name="customer_name"  />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Customer Phone
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input type="number"  id="contact" class="form-control" name="customer_phone"  />
                                                    </div>
                                                </div>

                                                                                    
                                                                                </div>
                                                                                <div class="form-actions">
                                                                                    <div class="row">
                                                                                        <div class="col-md-offset-3 col-md-9">
                                                                                            <input type="submit" class="mahesh btn btn-primary" value="Save"> &nbsp;
                                                                                            <input type="button" class="btn btn-danger" value="Cancel"> &nbsp;
                                                                                            <input type="reset" id="add-news-reset-editable" class="btn btn-default" value="Reset">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        <!-- </div>
                                                                    </div>
                                                                </div> -->
                                                        </div>
                                                        <div class="tab-pane fade" id="tab2default">
                                                            <!-- form -->
                                                            <!-- <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-12"> -->
                                    <form id="add_news_form" method="post" action="{{route('other.store')}}"  class="form-horizontal">

                                         {{ csrf_field() }}

                                                                            <div class="form-body">

                                                                                      <div class="form-group" hidden>
                                                    <label class="col-md-3 control-label" for="usr_name">
                                                        Id
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-user-md text-primary"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="usr_name"  name="id" value="{{$id}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                                            
                                                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                        Product

                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <select class="form-control" name="product_id" id="district">

                                                            <option value>Select product</option>
                                                            @foreach($products as $product)
                                                            <option value="{{$product->product_id}}">{{$product->product->name}}</option>
                                                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Quantity
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input type="decimal"  id="contact" class="form-control" name="quantity"  />
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Comment
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <textarea type="text"  id="contact" class="form-control" name="comment" /> </textarea> 
                                                    </div>
                                                </div>

                                                                                
                                                                            </div>
                                                                            <div class="form-actions">
                                                                                <div class="row">
                                                                                    <div class="col-md-offset-3 col-md-9">
                                                                                        <input type="submit" class="mahesh btn btn-primary" value="Save"> &nbsp;
                                                                                        <input type="button" class="btn btn-danger" value="Cancel"> &nbsp;
                                                                                        <input type="reset" id="add-news-reset-editable" class="btn btn-default" value="Reset">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        
                                                                    <!-- </div>
                                                                </div>
                                                            </div> -->
                                                            <!-- End form -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- </div>
                                    </div> -->
                                <!-- </div> -->
                                <!-- end tab form -->


                        </div>
                    </div>
                </div>
                <!-- col-md-6 -->
                <!--row -->
                <!--row ends-->
            </div>

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i> Record Nutrition
                                </h4>
                                <span class="pull-right">

                                </span>
                            </div>


                            <div class="panel-body">
                                <table class="table table-bordered text-center" >
                                    <thead>
                                        <tr>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($nutritions as $nutrition)
                                       
                                            <td>{{$nutrition->product->name}}</td>
                                            <td>{{$nutrition->quantity}}</td>
                                            <td>{{number_format($nutrition->quantity * $nutrition->product->amount)}} rwf</td>
                                            
                                            <td>
                                                 <a class=" btn btn-danger" href="{{route('sale.destroy',['id'=>$nutrition->id])}}">
                                                    <i class="fa fa-trash-o"></i> Remove
                                                </a>
                                            </td>
                                        </tr>

                                        @endforeach
                                     
                                        
                                    
                                    </tbody>
                                </table>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-lg-12">
                                            <a type="submit" class="mahesh btn btn-primary" value="Receipt" href="{{route('sale.receipt',['id'=>$id])}}">Receipt </a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.content -->
        </aside>
        <!-- /.right-side -->

        @endsection