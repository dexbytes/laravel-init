@extends('layouts.app', ['activePage' => 'users', 'activeButton' => 'users', 'title' => 'Edit User', 'navName' => 'Edit User'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">     
                <div class="col-xl-12">
                    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">
                      <span class="nc-icon nc-stre-left"></span> {{ __('auth.Back') }}
                    </a> 
                </div>
            </div>

            <div class="section-image" data-image="">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <h5 class="card-header bg-light">
                            <label class="card-title">
                            {{ __('auth.User informations') }}</label>
                        </h5>
                        <div class="card-body">
                            <form id="updateValidation" method="post" action="{{ route('users.update', [$user->id]) }}">
                                @csrf
                                @method('patch')
          
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
        
                                <div class="pl-lg-4">
                                    
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            {{ __('auth.Name') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ $user->name }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('auth.Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ $user->email }}" readonly>
        
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">
                                        {{ __('auth.Role') }}</label>
                                           <select name="roles" id="input-role" class="form-control" required="true" @if($user->id == 1) readonly @endif>
                                                <option value="">-</option>
                                                @foreach($roles as $value)
                                                <option value="{{$value}}" {{$userRole == $value ? "selected" : ""}}>{{ $value }}</option>
                                                 @endforeach
                                         </select>
                                        @include('alerts.feedback', ['field' => 'role_id'])
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('auth.New Password') }}
                                        </label>
                                        <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required MINLENGTH="6" MINLENGTH="12">
        
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-confirm-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('auth.Confirm New Password') }}
                                        </label>
                                        <input type="password" name="confirm-password" id="input-confirm-password" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required="true" equalTo="#input-password">
                                    </div>
                                    
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary pull-right">{{ __('auth.Save') }}</button>
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

@endsection
@push('js')
    <script type="text/javascript">
       $(document).ready(function() {
            setFormValidation('#updateValidation');
            setFormValidation('#changePasswordValidation');
        });
    </script>
@endpush