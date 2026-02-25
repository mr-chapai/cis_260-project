@props([
    'label' => '',
    'name' => 'name',
    'type' => '',
    'placeholder' => '',
     'value'=>'',
     'divclass' => 'col-md-6 border-dark',
     'value'=>''


])




<div class="{{$divclass}}">
    <label class="form-label mt-2" for={{$name}} > {{$label}}</label>
    <input class="form-control border-dark "  type={{$type}}  name={{$name}} id={{$name}} placeholder="{{$placeholder}}" value="{{$value}}">
    @error($name)
    <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>
