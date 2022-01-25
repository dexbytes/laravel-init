@extends('layouts/app', ['activePage' => 'roles', 'activeButton' => 'users', 'title' => 'Create Role', 'navName' => 'Create Role'])
 
@section('content')
<div class="content">
    <div class="container-fluid mt--6">
        <div class="row">     
            <div class="col-xl-12">
                <a href="{{ route('users.index') }}" class="btn btn-default pull-right">
                  <span class="nc-icon nc-stre-left"></span>{{ __('application.Back') }}
                </a> 
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 order-xl-1">
                    @include('alerts.success')
                    @include('alerts.errors')
                    
                    <form id="roleValidation" method="post" action="{{ route('roles.index') }}" class="form-horizontal" role="form">
                        @csrf
                        @if(count($elements))                            
                            @foreach($elements as $section => $fields)
                                <div class="card">
                                 <h5 class="card-header bg-light">
                                    <label class="card-title">{{ $fields['title'] }}</label>
                                </h5>

                                <div class="card-body">
                                    @if(!empty($fields['desc']))
                                        <h6 class="card-subtitle mb-2 text-muted">{{  $fields['desc'] }}</h6>
                                    @endif
                                  <div class="row">
                                        <div class="col-md-7 offset-md-1">
                                            @foreach($fields['elements'] as $field)
                                                @includeIf('form.' . $field['type'] )
                                            @endforeach
                                        </div> 
                                    </div> 
                                </div>
                            </div>                                 
                            @endforeach

                        @endif


                    <div class="card">
                    <h5 class="card-header bg-light">
                        <label class="card-title">
                            {{ __('auth.Permission') }}
                        </label>
                    </h5>

                    <div class="card-body">                
                        <div class="row">
                            @foreach($allPermissions as $key => $permission)
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                {{$key}}
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    @foreach($permission as $value)
                                    <tr>                                    
                                        <td>
                                            <div class="preference">
                                              <input name="permission[]" class="form-check-input" value="{{ $value['id'] }}" type="checkbox">
                                                <label for="permission">
                                                    {{ $value['label_name']}}
                                                </label>
                                            </div>
                                        </td>                                
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                    </div>
                </div> 


                        <div class="row m-b-md">
                            <div class="col-md-12">
                                <button class="btn-primary btn pull-right">
                                    {{ __('application.Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>              
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
   $(document).ready(function() {
       setFormValidation('#roleValidation');
    });
</script>
@endpush