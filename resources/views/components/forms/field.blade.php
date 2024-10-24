@props(['label', 'amount'])

<div>
    @if ($label)
        <x-forms.label :$label/>
    @endif

    <div class="mt-1">
        {{ $slot }}

        <x-forms.error :error="$errors->first($label)" />
    </div>
</div>