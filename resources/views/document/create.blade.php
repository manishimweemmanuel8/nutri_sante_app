@extends('multiauth::layouts.app') 
@section('content')
    <aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Document</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Document</a>
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
                                    <i class="fa fa-fw fa-file-text-o"></i> Add New Document
                                </h4>
                                <span class="pull-right">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                       <form id="add_users_form" method="post" action="{{route('document.store')}}" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                        File
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="file"  id="contact" class="form-control" name="file"  />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Description
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <textarea type="text"  id="contact" class="form-control" name="description">   </textarea>
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

                                <div class="panel-body">

                                 <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Document List
                            </h4>
                                <span class="pull-right">
                                
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                 {{-- @include('multiauth::message') --}}
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">File/Download</th>
                                           
                                            {{-- <th class="text-center">Edit/Save</th> --}}
                                            <th class="text-center">Delete/Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                        @foreach($documents as $document)
                        
                                        <tr>
                                            <td>{{$document->created_at}}</td>
                                            
                                            <td>{{$document->description}}</td>
                                            <td class="text-center">
                                             
                                                   

                                                 
                                                    <a class="dropdown-item" href=" {{route('document.download',['document'=>$document->file])}}">Download</a>

                                                   


                                            </td>
                                            
                                          
                                           
                                            {{-- <td>
                                                <a class=" btn btn-primary" href="{{route('document.edit',['id'=>$document->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                                </a>
                                            </td> --}}
                                            <td>
                                                <a class=" btn btn-danger" href="{{route('document.destroy',['id'=>$document->id])}}" onclick="return confirmation()">
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