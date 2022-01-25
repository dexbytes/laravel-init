<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <div class="checkbox mt-3">
        @if(!empty($field['options']))
            @if(count($field['options']))                            
                @foreach($field['options'] as $optionKey => $optionValue)
                    <label class="form-control-label form-check-inline">
                        <input name="{{ $field['name'] }}[]" 
                                class="form-check-input" 
                                value="{{ $optionKey }}" 
                                type="checkbox" 
                                @if(in_array($optionKey, $field['value'])) checked="checked" @endif
                                 @if(!empty($field['rules']) && strpos($field['rules'],'required') >= 0) 
                                required @endif
                                >
                        {{ $optionValue }}
                    </label>
                @endforeach
            @endif
        @else

            <label class="form-control-label form-check-inline">
                <input name="{{ $field['name'] }}" 
                        class="form-check-input" 
                        value="{{ $field['value'] }}" 
                        type="checkbox" 
                        @if(old($field['name'], $field['value'])) checked="checked" @endif
                         @if(!empty($field['rules']) && strpos($field['rules'],'required') >= 0) 
                        required @endif
                        >
                {{ $field['label'] }}
            </label>
    
        @endif

        @if ($errors->has($field['name'])) 
            <small class="help-block">
                {{ $errors->first($field['name']) }}
            </small>
        @endif
    </div>
</div>