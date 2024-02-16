<div class="form-group">
    <label class="form-label" for="{{ $id }}">{{ $label }}
    </label>
    <input class="form-input" id="{{ $id }}" name="{{ $name }}" type="{{ $type ?? 'text' }}"
        value="{{ $slot }}" {{ $required ?? false ? 'data-validate="require"' : null }} placeholder="{{ $placeholder ?? false }}"  />
    @error($name)
        <x-input-error :messages="$message" class="mt-2" />
    @enderror
</div>
