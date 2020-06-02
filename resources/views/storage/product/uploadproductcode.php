
                <div class="row">
                    <div class="col-lg-12">
                        <!-- First Basic Table strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-file"></i> Add File
                                </h3>
                            </div>
                            <div class="panel-body" style="padding:30px;">
                                <div class="row">
                                    <p>
                                        File  to Upload must be CSV file.
                                   

                                    <form method='post' class="form-inline" action="{{route('product.upload')}}" enctype='multipart/form-data' >
                                       {{ csrf_field() }}
                                       <input type='file' name='file' >
                                       <input type='submit' name='submit' value='Import'>
                                     </form>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>