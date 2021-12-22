<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label class="form-control-label form-check-inline" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <input type="{{ $field['type'] }}"
           name="{{ $field['name'] }}"
           value="{{ old($field['name']) }}"
           class="form-control {{ Arr::get( $field, 'class') }}"
           id="{{ $field['name'] }}"
           placeholder="{{ $field['label'] }}">

    @if ($errors->has($field['name'])) 
        <small class="help-block">
            {{ $errors->first($field['name']) }}
        </small> 
    @endif
</div>
@if($field['value'])
<div class="mt-2">
    <img class="img-thumbnail form-logo" src="{{asset(old('logo', $field['value']))}}" >
</div>
@endif
