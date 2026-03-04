@props([
    'groupLabe' => null,
    'name',
    'value',
    'options'=>[],
    'label' => '',
    'checked' => false,
])

<div class="form-check row">
    <samp>{{$groupLabe}}</samp>
    @foreach($options as $value => $label)
        <div class="form-check ">
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $value }}"
                id="{{ $name . '_' . $value }}"
                class="form-check-input mt-2 border-dark form-check-inline"
                {{ old($name) == $value ? 'checked' : '' }}
            >

            <label class="form-check-label" for="{{ $name . '_' . $value }}">
                {{ $label }}
            </label>

        </div>
    @endforeach

</div>
