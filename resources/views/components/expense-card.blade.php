@props(['expense','expenseTypes'])

<x-panel class="flex flex-col text-center bg-white/10 hover:bg-white/20">
    <div class="text-4xl font-bold py-4">{{ $expense->label }}</div>
    <div class="self-center text-3xl  "> Type: {{ $expense->expenseType->name }}</div>

    <div class="py-4">
        <h3 class="group-hover:scale-105 text-x1 font-bold duration-100">
            
            <div class="flex justify-center py-4">
            <span>{{ $expense->created_at->format('d/m/Y') }}</span>
            </div>
            <span flex class="text-4xl text-red-800">-{{ $expense->amount }}$</span>
        </h3>

            <form class="mt-5" action="{{ route('expenses.delete', ['expense' => $expense]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-white/10 hover:bg-red-500 duration-300 rounded py-2 px-6 font-bold hover:text-white">Delete</button>
            </form>
    </div>


</x-panel>
