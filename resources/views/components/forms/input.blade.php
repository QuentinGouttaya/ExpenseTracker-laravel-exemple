@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <input class="self-center rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-96 hover:bg-white/20 duration-300"{{ $attributes($defaults) }}>
</x-forms.field>