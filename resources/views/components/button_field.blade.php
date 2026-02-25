@props([
    'name' => 'inputName',
    'placeholder' => '',

])
<div {{$attributes->merge(['divclass' => 'd-grid gap-2 col-6 mx-auto'])}}>
        <button
            name={{$name}}
            id={{$name}}
            {{$attributes->merge(['class' => 'btn btn-primary mt-4'])}}
             type="button"> {{$placeholder}}</button>

</div>

