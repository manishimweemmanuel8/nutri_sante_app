@extends('multiauth::layouts.app') 
@section('content')

  <aside class="right-side right-padding">
            <section class="content-header">
                <!--section starts-->
                <h2>Users</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="viewUser.php">View User</a>
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
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> View Users
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
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Edit/Save</th>
                                            <th class="text-center">Delete/Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->created_at }}</td>
                                            
                                            <td>{{ $admin->name }}</td>
                                            <td>
                                                <span class="badge">
                                                @foreach ($admin->roles as $role)
                                                <span class="badge-warning badge-pill ml-2">
                                            {{ $role->name }}
                                        </span>
                                    </span>
                                         @endforeach

                                            </td>
                                            <td>   {{ $admin->active? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a class=" btn btn-primary" href="{{route('admin.edit',[$admin->id])}}">
                                                    <i class="fa fa-fw fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a class="delete btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                                    
                                                    <i class="fa fa-trash-o"></i> Delete

                                                </a>

                                               <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                                @csrf @method('delete')
                                            </form>


                                            </td>

                                            @endforeach
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

@endsection