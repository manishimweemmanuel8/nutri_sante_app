@extends('multiauth::layouts.app') 
@section('content')
    <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2> Production</h2>
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
                                    <i class="fa fa-fw fa-file-text-o"></i> Add In Production
                                </h4>
                                <span class="pull-right">

                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                       <form id="add_users_form" method="post" action="{{route('production.store')}}" class="form-horizontal">
                                            {{ csrf_field() }}
                                            
                                               

                                             <input type="hidden"  id="contact" class="form-control" name="after_preparation_id" value="{{$afterPreparation->id}}"  />

                                               
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        
                                                       
                                                    </label>
                                                    <div class="col-md-7">
                                                       <input type="" id="add-news-reset-editable" class="btn btn-default" value="{{$afterPreparation->preparation->rowProduct->product->name}}">
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Available Quantity
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                       <input type="" id="add-news-reset-editable" class="btn btn-default" value="{{number_format($afterPreparation->quantity)}} {{$afterPreparation->preparation->rowProduct->category}}">
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
                                                        Employee name
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input type="decimal"  id="contact" class="form-control" name="employee_name"  />
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
                                    </div>
                                </div>
                            </div>

                               
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