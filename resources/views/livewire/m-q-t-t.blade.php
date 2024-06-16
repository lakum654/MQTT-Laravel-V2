<div>
    <div class="form-control bg-white">
        <div class="mb-3">
            <label for="deviceList" class="form-label">Device (Topic)</label>
            <select class="form-select" id="deviceList" aria-label="Device List" wire:model="topic">
                <option value="" selected>Select a device</option>
                @foreach ($devices as $device)
                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Switch</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="switchOnOff" wire:model="status">
                <label class="form-check-label" for="switchOnOff">On/Off</label>
            </div>
        </div>
        <button wire:click="publish" class="btn btn-primary" @if($loading) disabled @endif>
            <span wire:loading.remove wire:target="publish">Save</span>
            <span wire:loading wire:target="publish">Starting...</span>
            <span wire:loading wire:target="publish" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        </button>
    </div>

    @if($message)
        <div class="mt-2">
            <div class="alert alert-primary" role="alert">
                {{ $message }}
            </div>
        </div>
    @endif
</div>
