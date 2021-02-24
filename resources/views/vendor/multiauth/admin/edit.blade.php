@extends('multiauth::layouts.app') 
@section('content')

<aside class="right-side right-padding">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h2>Edit User</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Edit User</a>
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
                                    <i class="fa fa-fw fa-file-text-o"></i> Edit User
                                </h4>
                                <span class="pull-right">
                                   
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                       @include('multiauth::message')
                                         <form id="add_users_form" action="{{route('admin.update',[$admin->id])}}" method="post" class="form-horizontal">
                                            @csrf @method('patch')

                                            <div class="form-body">
                                               
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Names
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                           <input type="text" value="{{ $admin->name }}" name="name" class="form-control col-md-6" id="role">
                                                    </div>
                                                </div>
                                        
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        E-Mail Address
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                         <input type="text" value="{{ $admin->email }}" name="email" class="form-control col-md-6" id="role">
                                                    </div>
                                                </div>


                                               

                                               

                                               
                                            
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="categry">
                                                        Assign Role
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <select name="role_id[]" id="role_id" class="form-control col-md-6 {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                                            <option selected disabled>Select Role</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}" 
                                                                    @if (in_array($role->id,$admin->roles->pluck('id')->toArray())) 
                                                                        selected 
                                                                    @endif >{{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select> 

                                                        @if ($errors->has('role_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('role_id') }}</strong>
                                                            </span> 
                                                        @endif
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label" for="mail">
                                                        Active
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           
                                                           <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation"  id="active">
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                            </div>


                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="mahesh btn btn-primary" value="Edit"> &nbsp;
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
                    </div>
                </div>
                <!-- col-md-6 -->
                <!--row -->
                <!--row ends-->
            </div>
            <!-- /.content -->
        </aside>
@endsection
