<div class="flex items-center">
    <input type="radio" wire:model.live="{{$model}}" value="{{$value}}" class="w-6 h-6  bg-gray-100 border-gray-300  checked:bg-dark-green">
    <label class="ms-2">{{$slot}}</label>
</div>
