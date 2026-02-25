
@props([
    'name' => 'inputName',
     'label' => 'label',
    'placeholder' => '',
    'row'=>'',
    'value'=>''

])


<div class="mb-3 mt-2">
    <label for="{{$name}}" class="form-label">{{$label}}</label>
    <textarea
        oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'
        name="{{$name}}" class="form-control form-control border-dark mt-2"  id="{{$name}}" rows="{{$row}}" >{{ old($name, $value ?? '') }} </textarea>
    @error($name)
    <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>
