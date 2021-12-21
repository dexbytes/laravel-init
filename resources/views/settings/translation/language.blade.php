@extends('layouts/app', ['activePage' => 'translation', 'activeButton' => 'settings', 'title' => 'Language', 'navName' => 'Language'])

@section('content')
<div class="content">
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                    <div class="card">
                         <h5 class="card-header bg-light">
                            <label class="card-title">{{__('application.List of your languages')}}</label>
                        </h5>

                        <div class="card-body">
                           <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <table class="table">
                                        <tr>
                                            <th>{{ __('application.Language')}}</th>
                                            <th class="text-center">{{ __('application.Action')}}</th>
                                        </tr>
                                    @foreach(\App\Dexlib\Locale::getActiveLang() as $key => $lang)
                                        <tr>
                                            <td>{{$lang}}</td>
                                            <td class="text-center">
                                                <a class="nav-link" href="{{ route('translation.edit', $key) }}">
                                                    {{ __('application.Edit') }} 
                                                </a>
                                            </td> 
                                        </tr>
                                    @endforeach
                                    </table>
                                </div> 
                            </div> 
                        </div>
                    </div>                              
             </div>
        </div>
    </div>
</div>
@endsection