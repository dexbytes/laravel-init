<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <div class="radio mt-3">
       <label class="form-control-label">{{$field['label'] }}</label>
        @foreach(Arr::get($field, 'options', []) as $val => $label)
            <label class="form-control-label form-check-inline">
                <input name="{{ $field['name'] }}" 
                        class="form-check-input" 
                        value="{{$val}}" 
                        type="radio" 
                        @if( old($field['name'], \setting($field['name'])) == $val ) checked="checked"  @endif
                        >
                {{ $label }}
            </label>
        @endforeach
        @if ($errors->has($field['name'])) 
            <small class="help-block">
                {{ $errors->first($field['name']) }}
            </small>
        @endif
    </div>
</div>
