@extends('layouts/app', ['activePage' => 'users', 'activeButton' => 'users', 'title' => 'Edit User', 'navName' => 'Edit User'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">     
                <div class="col-xl-12">
                    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">
                      <span class="nc-icon nc-stre-left"></span>{{ __('auth.Back') }}
                    </a> 
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xl-12 order-xl-1">
                    @include('alerts.success')
                    @include('alerts.errors')
                    
                     <form id="updateValidation" method="post" action="{{ route('users.update', [$user->id]) }}">
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
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">
   $(document).ready(function() {
       setFormValidation('#updateValidation');
    });
</script>
@endpush