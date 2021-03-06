@extends('layouts/app', ['activePage' => 'roles', 'activeButton' => 'users', 'title' => 'Roles', 'navName' => 'Roles'])

@section('content')

    <div class="content">
        <div class="container-fluid">
            @can('role-create')
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary pull-right">
                      <span class="fa fa-plus"></span> {{__('auth.Create New Role') }}
                    </a> 
                </div>
            </div>
            @endcan

            <div class="row mt-3">
                @include('alerts.success')
                @include('alerts.errors')
                
                <div class="col-md-12">
                    <div class="card table-with-links">
                        <div class="card-body table-full-width content table-responsive">
                            <table class="table table-hover table-striped ">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th> {{__('auth.Name') }}</th>
                                        <th class="text-center"> {{__('auth.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td class="td-actions text-center">
                                           @if($role->name != 'Admin')
                                           @can('role-edit')
                                                <a href="{{ route('roles.edit',$role->id) }}" rel="tooltip" title="Edit" class="btn btn-success btn-link btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                             @can('role-delete')
                                             
                                                <a href="javascript:void(0)" id="{{$role->id}}" data-url="{{ URL::route('roles.destroy', [$role->id]) }}" data-id="{{ $role->id }}" rel="tooltip" title="Delete" data-heading="Delete role" data-content="Are you sure want to delete this role?" class="btn btn-danger btn-link btn-xs confirm-delete" data-button-text="delete role">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                               
                                            @endcan
                                         @else
                                            Full Access
                                          @endif
                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>

                            <div class="text-center"> 
                                  {{ $roles->render("pagination::bootstrap-4") }}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 