@extends('layouts/app', ['activePage' => 'translation', 'activeButton' => 'settings', 'title' => __('Translation'), 'navName' => __(' :name Translation', ['name' => $langName])])

@section('content')
<div class="content">
    <div class="container-fluid mt--6">
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
                                        {{('application.Select a file')}}
                                    </label>
                                    <select name="file" 
                                            class="form-control" 
                                            id="file_list">
                                            <option value="">-</option>
                                            @foreach($files as $val => $file)
                                                <option value="">
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
    </div>
</div>
@endsection