@props(['label', 'amount', 'expenseTypes'])

<div>


    @if ($label)
        <x-forms.label :$label />
    @endif

    <div class="mt-1">

    @if ($label == 'Type')
    <select name="expenseType" id="expenseType" class=" hover:bg-white/20 duration-300 rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full">
        @foreach ($expenseTypes as $type)
            <option value="{{ $type->id }}" {{ old('expenseType') == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select>
    
    @endif
       
        {{ $slot }}

        <x-forms.error :error="$errors->first($label)" />
    </div>
</div>