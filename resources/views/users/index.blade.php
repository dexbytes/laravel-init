@extends('layouts/app', ['activePage' => 'users', 'activeButton' => 'users', 'title' => 'Users', 'navName' => 'Users'])

@section('content')

    <div class="content">
        <div class="container-fluid">           
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchInput" name="x" placeholder="{{ __('auth.Search user') }}...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                        </span>
                    </div>
                </div>
                @can('user-create')
                <div class="col-md-9 col-xs-6">
                    <a href="{{ route('users.create') }}" class="btn btn-primary pull-right">
                      <span class="fa fa-plus"></span> {{ __('auth.Create New User') }}
                    </a> 
                </div>
                @endcan
            </div>

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
                                        <th>{{ __('auth.Name')}}</th>
                                        <th>{{ __('auth.Email') }}</th>
                                        <th class="text-center">{{ __('auth.Role') }}</th>
                                        <th class="text-center">{{ __('auth.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $user)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center"> 
                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                               <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                          @endif</td>

                                        <td class="td-actions text-center">
                                          
                                            @can('user-edit')  
                                            <a href="{{ route('users.edit',$user->id) }}" rel="tooltip" title="Edit Profile" class="btn btn-success btn-link btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endcan

                                            @if($user->id != 1)
                                                @can('user-delete')
                                                 <a href="javascript:void(0)" id="{{$user->id}}" data-url="{{ URL::route('users.destroy', [$user->id]) }}" data-id="{{ $user->id }}" rel="tooltip" title="Delete" data-heading="Delete user" data-content="Are you sure want to delete this user?" class="btn btn-danger btn-link btn-xs confirm-delete" data-button-text="delete user">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                @endcan
                                            @endif
                                            
                                        </td>
                                    </tr>

                                     @endforeach
                                </tbody>
                            </table>
                         
                         <div class="text-center"> 
                          {{ $data->render("pagination::bootstrap-4") }}
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection