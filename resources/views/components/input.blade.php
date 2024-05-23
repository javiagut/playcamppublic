@props(['disabled' => false, 'class' => isset($class) ? $class : null, 'type' => $type, 'placeholder' => $placeholder, 'model' => $model, 'enter' => $enter, 'icon' => $icon, 'label' => $label, 'step' => isset($step) ? $step : 0])


<div class="flex items-center gap-2 {{$class}} border-b {{$type=='file' ? 'border-gray-200 hover:text-red-400': 'border-gray-200'}}   {{$type!='datetime-local' ? 'w-full' : ''}} {{$model=='search' ? 'bg-white border-white pl-2 shadow py-2' : ''}}">
    <span class="material-symbols-outlined text-red-400">{{$icon}}</span>
    @if ($type=='file')
        <label for="{{$model}}" id="fileLabel" class="cursor-pointer px-3">
            {{$label}}
        </label>
        <input id="{{$model}}" class="{{$icon=='' ? 'pr-3' : 'px-3'}} py-1 outline-none borderinput w-full hidden" type="{{$type}}" wire:model.lazy="{{$model}}" placeholder="{{$placeholder}}">
    @elseif($model=='search')
        <input class="{{$icon=='' ? 'pr-3' : 'px-3'}} py-1 outline-none borderinput w-full" type="{{$type}}" wire:model.live.debounce.250ms="{{$model}}" placeholder="{{$placeholder}}">
    @else
        <input class="{{$icon=='' ? 'pr-3' : 'px-3'}} py-1 outline-none borderinput w-full" type="{{$type}}" step="{{$step}}" wire:model.defer="{{$model}}" placeholder="{{$placeholder}}">
    @endif
</div>