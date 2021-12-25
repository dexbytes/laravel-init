@extends('layouts/app', ['activePage' => 'translation', 'activeButton' => 'settings', 'title' => __('Translation'), 'navName' => __(' :name Translation', ['name' => $langName])])

@section('content')
<div class="content">
    <div class="container-fluid mt--6">
        <div class="row">     
            <div class="col-xl-12">
                <a href="{{ route('translation.index') }}" class="btn btn-default pull-right">
                  <span class="nc-icon nc-stre-left"></span> {{ __('application.Back') }}
                </a> 
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 order-xl-1">
                    @include('alerts.success')
                    @include('alerts.errors')
            
                    <div class="card">
                        <h5 class="card-header bg-light">
                            <label class="card-title">{{__('application.Edit the language :name', ['name' => $langName])}}</label>
                        </h5>

                        <div class="card-body">
                           <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label" for="file">
                                        {{ __('application.Select a file') }}
                                    </label>
                                    <select name="file" 
                                            class="form-control" 
                                            id="file_list">
                                            <option value="">-</option>
                                            @foreach($files as $val => $file)
                                                <option value="{{ $file['code']}}" @if($file['code'] == $fileName ) selected  @endif >
                                                    {{ $file['name'] }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                           </div>
                       </div>
                   </div>
            </div>
        </div>
    @if(!empty($contents))  
        <form id="settingsValidation" method="post" action="{{ route('translation.save') }}" class="form-horizontal" role="form">
         @csrf
        <input type="hidden" name="fileName" value="{{$fileName}}">
        <input type="hidden" name="lang" value="{{$lang}}">
         
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                     <tr>
                                        <th scope="col" width="40%">{{ __('application.Key') }}</th>
                                        <th scope="col" width="60%">{{ __('application.Translation') }}
                                       <i class="small">
                                       ({{ __('application.leave blank to use default translation') }})</i>
                                    </th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    @if(is_array($contents))
                                     @foreach($contents as $key => $value)
                                        @if(!is_array( $value))
                                            <tr>
                                                <td class="wrap">{{ $key }}</td>
                                                <td>
                                                    <input class="form-control" type="text" name="translationValues[{{$key}}]" value="{{ $value }}">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @endif
                                 </tbody>                       
                            </table>                                    
                        </div>
                   </div>
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

    @endif
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function () {   
        $('#file_list').on('change', function () { 
          var id = $(this).val();
          if (id) { 
            var URL = "{{ route('translation.edit', ['lang' => $lang, 'file' => 'FILENAME']) }}";
            URL = URL.replace('FILENAME', id);
            window.location.replace(URL);
          }
          return false;
    });
}); 
</script>
@endpush