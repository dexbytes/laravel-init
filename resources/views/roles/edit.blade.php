@extends('layouts/app', ['activePage' => 'roles', 'activeButton' => 'users', 'title' => 'Edit Role', 'navName' => 'Edit Role'])
 

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">     
                <div class="col-xl-12">
                    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">
                      <span class="nc-icon nc-stre-left"></span> Back
                    </a> 
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                         <h5 class="card-header bg-light">
                            <label class="card-title">{{ __('Role informations') }}</label>
                        </h5>
                        <div class="card-body">
                            <form method="post" action="{{ route('roles.update', [$role->id]) }}">
                                @csrf
                               @method('put')
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            {{ __('Name') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ $role->name }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>                                     
                                </div>

                                <h6 class="heading-small text-muted my-4">{{ __('Permission') }}</h6>
                                <div class="pl-lg-4">
                                     @foreach($permission as $value)

                                      <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" name="permission[]" type="checkbox" value="{{$value->id}}" {{in_array($value->id, $rolePermissions) ? 'checked' : ''}} >
                                                    <span class="form-check-sign"></span> 
                                                     {{ $value->name }}        
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary pull-right mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 