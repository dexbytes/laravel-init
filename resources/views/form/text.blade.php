<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label class="form-control-label form-check-inline" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <input type="{{ $field['type'] }}"
           name="{{ $field['name'] }}"
           value="{{ old($field['name'], $field['value']) }}"
           class="form-control {{ Arr::get( $field, 'class') }}"
           id="{{ $field['name'] }}"
           placeholder="{{ $field['label'] }}"
           @if(!empty($field['rules']) && preg_match("~\brequired\b~", $field['rules']) > 0) 
           required @endif>
          
    @if ($errors->has($field['name'])) 
        <small class="help-block">
            {{ $errors->first($field['name']) }}
        </small> 
    @endif
</div>