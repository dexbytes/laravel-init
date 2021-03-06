<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label class="form-control-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <textarea name="{{ $field['name'] }}" 
           class="form-control {{ Arr::get( $field, 'class') }}"
           id="{{ $field['name'] }}"
           cols="{{ $field['cols'] }}"
           rows="{{ $field['rows'] }}"
            @if(!empty($field['rules']) && preg_match("~\brequired\b~", $field['rules']) > 0) 
            required @endif>{{ old($field['name'],$field['value']) }}</textarea>

    @if ($errors->has($field['name'])) 
        <small class="help-block">
            {{ $errors->first($field['name']) }}
        </small> 
    @endif
</div>