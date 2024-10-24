@props(['budget'])

<x-layout class="flex">
        <section class="p-6 bg-white/5 rounded-xl border border-transparent hover:border-blue-800 group transition-colors duration-300">
            <x-section-heading>Budget</x-section-heading>

            <div class="text-center font-bold text-5xl">
                Your budget is set to {{ $budget->amount }}$
            </div>


        </section>
</x-layout>