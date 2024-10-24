@props(['expense'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-3xl">{{ $expense->label }}</div>

    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-x1 font-bold transition-colors duration-300">
            <span>{{ $expense->created_at->format('d/m/Y') }}</span><br><br>
            <a href="{{ $expense->label }}" target="_blank">
                <span class="text-5xl text-red-800">-{{ $expense->amount }}$</span>
            </a>
        </h3>
    </div>
</x-panel>