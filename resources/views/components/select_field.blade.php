@props([
    'label' => 'label',
    'name' => '',
    'options'=>[],
    'value' => ''


])
<div class="mb-3 col-6">
    <label class="form-label" for="{{$name}}">{{ $label }}</label>

    <select name="{{ $name }}" class="form-control border-dark">
        @foreach($options as $key => $option)
            <option value="{{ $key }}"
                {{ $value == $key ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>

    @error($name)
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>
