@props(['label' => '', 'name' => ''])


<div class="col-12">
    <div class="form-check">
        <input name="{{$name}}" class="form-check-input border-dark mt-2" type="checkbox" id="{{$name}}">
        <label class="form-check-label" for="{{$name}}">
            {{$slot}}
        </label>
    </div>
</div>
