<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <div class="checkbox mt-3">
        <label class="form-control-label form-check-inline">
            <input name="{{ $field['name'] }}" 
                    class="form-check-input" 
                    value="{{$field['value']}}" 
                    type="checkbox" 
                    @if(old($field['name'], \setting($field['name']))) checked="checked" @endif
                    >
            {{ $field['label'] }}
        </label>

        @if ($errors->has($field['name'])) 
            <small class="help-block">
                {{ $errors->first($field['name']) }}
            </small>
        @endif
    </div>
</div>