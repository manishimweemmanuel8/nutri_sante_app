@extends('multiauth::layouts.app')
@section('content')

 <aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Roles</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="viewUser.php">View Role</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> View Roles
                            </h4>
                                <span class="pull-right">
                            
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                @include('multiauth::message')
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                           <th class="text-center">Date</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">users</th>
                                            <th class="text-center">Edit/Save</th>
                                            <th class="text-center">Delete/Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                    @foreach ($roles as $role)

                        
                                        <tr>
                                            <td>{{ $role->created_at }}</td>
                                            
                                            <td>{{ $role->name }}</td>
                                            <td>
                                               <span class="badge badge-primary badge-pill">{{ $role->admins->count() }}  Users</span>

                                            </td>
                                        
                                            <td>
                                                @permitTo('UpdateRole')
                                                <a class=" btn btn-primary" href="{{ route('admin.role.edit',$role->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                                </a>
                                                @endpermitTo
                                            </td>
                                            <td>
                                                @permitTo('DeleteRole,UpdateRole')

                                                <a href="" class=" btn btn-danger" 

                                                
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                                    
                                                    <i class="fa fa-trash-o"></i> Delete

                                                </a>

                                                <form id="delete-form-{{ $role->id }}"
                                                    action="{{ route('admin.role.delete',$role->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf @method('delete')
                                                </form>
                                                  @endpermitTo


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