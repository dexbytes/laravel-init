@extends('layouts/app', ['activePage' => 'users', 'activeButton' => 'users', 'title' => 'Create User', 'navName' => 'Create User'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">     
                <div class="col-xl-12">
                    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">
                      <span class="nc-icon nc-stre-left"></span> Back
                    </a> 
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <h5 class="card-header bg-light">
                            <label class="card-title"> {{ __('User informations') }}</label>
                        </h5>
                        <div class="card-body">
                           <div class="row">
                           <div class="col-md-7 offset-md-1"> 
                            <form id="registerValidation" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            {{ __('Name') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required="true" autofocus>

                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <div class="form-group {{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">{{ __('Role') }}</label>
                                           <select name="roles" id="input-role" class="form-control" required="true">
                                                <option value="">-</option>
                                                @foreach($roles as $value)
                                                <option value="{{$value}}">{{ $value }}</option>
                                                 @endforeach
                                         </select>
                                        @include('alerts.feedback', ['field' => 'role_id'])
                                    </div>
                                   
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                        <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required="true" MINLENGTH="6" MINLENGTH="12">

                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="input-confirm-password">{{ __('Confirm Password') }}</label>
                                        <input type="password" name="confirm-password" id="input-confirm-password" class="form-control" placeholder="{{ __('Confirm Password') }}" value="" required="true" equalTo="#input-password">
                                    </div>

                                     <div class="form-group {{ $errors->has('photo') ? ' has-danger' : '' }} my-2">
                                        <label class="form-control-label" for="input-name">{{ __('Profile photo') }}</label> <br>
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="form-control-file{{ $errors->has('photo') ? ' is-invalid' : '' }}" id="input-picture" accept="image/*">
                                        </div>
        
                                        @include('alerts.feedback', ['field' => 'photo'])
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary pull-right mt-4">{{ __('Create User') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">
   $(document).ready(function() {
       setFormValidation('#registerValidation');
    });
</script>
@endpush