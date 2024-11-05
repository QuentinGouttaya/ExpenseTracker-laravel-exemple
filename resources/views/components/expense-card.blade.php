@props(['expense'])

<x-panel class="flex flex-col text-center bg-white/10 hover:bg-white/20">
    <div class="self-start text-3xl ">{{ $expense->label }}</div>

    <div class="py-8">
        <h3 class="group-hover:scale-105 text-x1 font-bold duration-100">
            <span>{{ $expense->created_at->format('d/m/Y') }}</span><br><br>
            <span flex class="text-5xl text-red-800">-{{ $expense->amount }}$</span>
        </h3>
        <div class="flex text-3xl">
            <form action="{{ route('expenses.delete', ['expense' => $expense]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-white/10 hover:bg-red-500 duration-300 rounded py-2 px-6 font-bold hover:text-white">Delete</button>
            </form>


        </div>
    </div>


</x-panel>
