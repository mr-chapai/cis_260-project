@props([
    'label' => 'label',
    'name' => '',
    'options'=>[],
    'value' => ''


])
<div class="mb-3">
    <label class="form-label">{{ $label }}</label>

    <select name="{{ $name }}" class="form-control">
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
