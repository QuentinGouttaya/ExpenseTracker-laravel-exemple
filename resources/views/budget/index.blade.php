@props(['budget'])

<x-layout>
    <section class="p-8 bg-white/5 rounded-xl border border-transparent">
        <x-section-heading>Budget</x-section-heading>

        <div class="text-center font-bold text-5xl">
            Your budget is set to {{ $budget->amount }}$
        </div>
    </section>
    <section class="py-15 bg-white/5 rounded-xl border border-transparent">
        <div class="text-center font-bold text-5xl {{$balance >= 0 ? 'text-green-500' : 'text-red-500'}}">
            Your balance is {{ $balance }}$
        </div>
    </section>

    <section class="py-10 bg-white/5 rounded-xl border border-transparent flex justify-center">
    @include('budget.set')
    </section>
</x-layout>